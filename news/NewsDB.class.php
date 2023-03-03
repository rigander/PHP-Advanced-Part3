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
        if (!$this->_db){
            $this->_db = new SQLite3(self::DB_NAME);
            $sql_msgs = "CREATE TABLE msgs(  
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
	                title TEXT,
	                category INTEGER,
	                description TEXT,
	                source TEXT,
	                datetime INTEGER)";
            $sql_catg = "CREATE TABLE category(
	                id INTEGER,
	                name TEXT)";
            $stmt_msgs = $this->_db->prepare($sql_msgs);
            $stmt_catg = $this->_db->prepare($sql_catg);

            $stmt_catg->bindParam(":id", $id);
            $stmt_catg->bindParam(":title", $title);
            $stmt_catg->bindParam(":category", $category);
            $stmt_catg->bindParam(":description", $description);
            $stmt_catg->bindParam(":source", $source);
            $stmt_catg->bindParam(":datetime", $datetime);

            $stmt_msgs->bindParam("id", $id);
            $stmt_msgs->bindParam("name", $name);

            $result=$stmt_msgs->execute();
            $result=$stmt_catg->execute();

            $stmt_catg ->close();
            $stmt_msgs ->close();
        }else{
            $this->_db = new SQLite3(self::DB_NAME);
        }
    }
    public function saveNews($title, $category, $description, $source){
        // TODO: Implement saveNews() method.
    }
    public function getNews(){
        // TODO: Implement getNews() method.
    }
    public function deleteNews($id){
        // TODO: Implement deleteNews() method.
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




