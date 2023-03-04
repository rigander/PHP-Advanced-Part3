<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color: #3c3f41">

</body>
</html>
<?php
require "INewsDB.class.php";
class NewsDB implements INewsDB{
    const DB_NAME = "../news.db";
    const ERR_PROPERTY = "Wrong property name";
    private $_db;
    function __construct(){
        $this->_db = new SQLite3(self::DB_NAME);
        if(!filesize(self::DB_NAME)){
            $sql = "CREATE TABLE msgs(  
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
	                title TEXT,
	                category INTEGER,
	                description TEXT,
	                source TEXT,
	                datetime INTEGER)";
            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
            $sql = "CREATE TABLE category(
	                id INTEGER,
	                name TEXT)";
            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
            $sql = "INSERT INTO category(id, name)
                    SELECT 1 as id, 'Политика' as name
                    UNION SELECT 2 as id, 'Культура' as name
                    UNION SELECT 3 as id, 'Спорт' as name ";
            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
        }
    }
    function saveNews($title, $category, $description, $source){
        $dt = time();
        $sql = "INSERT INTO msgs (title, category, description, source, datetime)
                VALUES ( '$title', $category, '$description', '$source', $dt)";
        return $this->_db-exec($sql);
    }
    public function getNews(){
        // TODO: Implement getNews() method.
    }
    public function deleteNews($id){
        // TODO: Implement deleteNews() method.
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



