<?php
require "INewsDB.class.php";
class NewsDB implements INewsDB{
    const DB_NAME = "../news.db";
    const ERR_PROPERTY = "Wrong property name";
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
    function saveNews($title, $category, $description, $source){
        $dt = time();
        $sql = "INSERT INTO msgs (title, category, description, source, datetime)
                VALUES ( '$title', $category, '$description', '$source', $dt)";
        return $this->_db->exec($sql);
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



