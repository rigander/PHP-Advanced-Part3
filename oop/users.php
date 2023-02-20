<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Labs</title>
</head>
<body style="background-color: #3c3f41; padding: 10px; color: #bd6f31; font-size: 25px;">

</body>
</html>
<?php

class User{
    public $name;
    public $login;
    public $password;
    function __construct($name, $login, $password){
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
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
    function __destruct(){
        echo "user: {$this->login} - deleted.";
        ?><br><?php
    }
}

$user1 = new User("Robert", "rob", "str123" );
$user2 = new User("John","heck","fer46_45deva");
$user3 = new User("Tim", "burton", "tbv45h67k");


$user1->showInfo();
$user2->showInfo();
$user3->showInfo();



