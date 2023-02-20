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
    function showInfo(){
        echo "user name : {$this->name}";
        ?><br><?php
        echo "user login : {$this->login}";
        ?><br><?php
        echo "user password : {$this->password}";
        ?><br><?php
        ?><br><?php
    }
}

$user1 = new User();
$user2 = new User();
$user3 = new User();

$user1->name = "Andrew";
$user1->login = "cloud";
$user1->password = "strong1234";

$user2->name = "Dima";
$user2->login = "sun";
$user2->password = "very_strong1234";

$user3->name = "Michael";
$user3->login = "moon";
$user3->password = "very_strong_pass_1234";

$user1->showInfo();
$user2->showInfo();
$user3->showInfo();



