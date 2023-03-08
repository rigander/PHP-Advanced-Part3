<?php
require "INewsDB.class.php";
class NewsDB implements INewsDB{
    const DB_NAME = "../news.db";
    const ERR_PROPERTY = "Wrong property name";
    const RSS_NAME = "rss.xml";
    const RSS_TITLE = "Latest news";
    const RSS_LINK = "http://mysite.local/news/news.php";
    private $_db;
    function __construct(){
        $this->_db = new SQLite3(self::DB_NAME);
        if(!filesize(self::DB_NAME)){
            //todo Здесь каждый sql запрос критичен, то есть если какая-то база
            // не создалась, то дальше не имеет смысла исполнять код.
            // здесь имеет смысл использовать try...catch.
            try {
                $sql = "CREATE TABLE msgs(  
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
	                title TEXT,
	                category INTEGER,
	                description TEXT,
	                source TEXT,
	                datetime INTEGER)";
                if (!$this->_db->exec($sql))
                    throw new Exception("Error. Can't create table");
                $sql = "CREATE TABLE category(
	                id INTEGER,
	                name TEXT)";
                if (!$this->_db->exec($sql))
                    throw new Exception("Error. Can't create table");
                $sql = "INSERT INTO category(id, name)
                    SELECT 1 as id, 'Politics' as name
                    UNION SELECT 2 as id, 'Culture' as name
                    UNION SELECT 3 as id, 'Sport' as name ";
                if(!$this->_db->exec($sql))
                    throw new Exception("Error. Can't create table");
            }catch (Exception $e){
                die($e->getMessage());
            }
        }
    }

    private function createRSS(){
        $dom = new DOMDocument("1.0", "utf-8");
        $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;

        $rss = $dom->createElement("rss");
        $dom->appendChild($rss);
        $version = $dom->createAttribute("version");
        $version->value = "2.0";
        //todo аттрибут (узел) $version вложен в тэг $rss через appendChild().
        $rss->appendChild($version);

        $channel = $dom->createElement("channel");
        $rss->appendChild($channel);

        $title = $dom->createElement("title", self::RSS_TITLE);
        $link = $dom->createElement("link", self::RSS_LINK);
        $channel->appendChild($title);
        $channel->appendChild($link);

        $articles = $this->getNews();
        if (!$articles) return false;

        foreach ($articles as $article){
            $item = $dom->createElement("item");
            $channel->appendChild($item);

            $dt = date("d-m-Y H:i:s", $article["datetime"]);


            $inner_title = $dom->createElement("title", $article["title"]);
            $inner_link = $dom->createElement("link", $article["source"]);

            $description = $dom->createElement("description");
            $cdata = $dom->createCDATASection($article["description"]);
            $description->appendChild($cdata);

            $pubDate = $dom->createElement("pubDate", $dt);
            $category = $dom->createElement("category", $article["category"]);

            $item->appendChild($inner_title);
            $item->appendChild($inner_link);
            $item->appendChild($description);
            $item->appendChild($pubDate);
            $item->appendChild($category);

            $dom->save(self::RSS_NAME);
        }

    }
    function saveNews($title, $category, $description, $source){
        $dt = time();
        $sql = "INSERT INTO msgs (title, category, description, source, datetime)
                VALUES ( '$title', $category, '$description', '$source', $dt)";
        $result = $this->_db->exec($sql);
        if (!$result){
            return false;
        }else $this->createRSS();
        return true;
    }
    function db2Arr($data){
     $arr = [];
     while($row = $data->fetchArray(SQLITE3_ASSOC))
          $arr[] = $row;
        return $arr;
    }
    public function getNews(){
        $sql = "SELECT msgs.id as id, title, category.name as category,
                description, source, datetime FROM msgs,
                category WHERE category.id = msgs.category
                ORDER BY msgs.id DESC";
        $items = $this->_db->query($sql);
        if (!$items)
            return false;
        return $this->db2Arr($items);
    }
    public function deleteNews($id){
        $sql = "DELETE FROM msgs WHERE id=$id";
        return $this->_db->exec($sql);
    }
    function escape($date){
        return $this->_db->escapeString(trim(strip_tags($date)));
    }
    function __destruct(){
        unset($this->_db);
    }
    function __get($name){
        if ($name == "db")
            return $this->_db;
        throw new Exception(self::ERR_PROPERTY);
    }
    function __set($name, $value){
        throw new Exception(self::ERR_PROPERTY);
    }
}



