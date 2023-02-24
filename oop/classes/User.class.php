<?php
class User{
    public $name;
    public $login;
    public $password;
    public static $count = 0;
    function __construct($name, $login, $password){
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        self::$count++;
    }
    function __clone(){
        self::$count++; //todo чтобы клонированные объекты тоже считались.
    }
    function showInfo(){
        echo "user name : {$this->name}";
        ?><br><?php
        echo "user login : {$this->login}";
        ?><br><?php
        echo "user password : {$this->password}";
        ?><br><?php
        ?><br><?php
    }
     public static function showAmountOfUsers(){
        $amount = self::$count - SuperUser::$superCount;
        echo "Total amount of Users : {$amount}";
        ?><br><?php
    }
    function __destruct(){
        echo "user: {$this->login} - deleted.";
        ?><br><?php
    }
}