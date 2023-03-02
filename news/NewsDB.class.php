<?php
require "INewsDB.class.php";
class NewsDB implements INewsDB{
    const DB_NAME = "../news.db";
    const ERR_PROPERTY = "Wrong property name";
    private $_db;
    function __construct(){
        $this->_db = new SQLite3(self::DB_NAME);
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


