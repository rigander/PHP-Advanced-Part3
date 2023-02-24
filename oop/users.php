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
//todo При помощи функции autoload подключается любой файл класса. Главное чтобы
// файлы были в одной папке и назывались по единой методологии.
// При таком подходе каждый класс инкапсулирует свою логику, а в основной файл не
// перегружен кодом.
function __autoload($class){
    include "/classes/".$class.".class.php";
    echo $class.".class.php";
}


$user1 = new User("Robert", "rob", "str123" );
$user2 = new User("John","heck","fer46_45deva");
$user3 = new User("Tim", "burton", "tbv45h67k");
$user4 = clone $user3; //todo Клонировали объект. При клонировании конструктор не
                       //     вызывается! И его нужно добавлять отдельной функцией,
                       //     для того чтобы посчитать все объекты.


$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

// todo Laba 1.3 and 1.4.
//  Реализация наследования классов.


$user = new SuperUser("Alice", "wander_girl", "alw1234_2", "great engineer");
$user->showInfo();
?><br><br><?php
User::showAmountOfUsers();
SuperUser::showAmountOfSuperUsers();
?><br><br><?php

//todo Классический пример использования статического метода.
// например для мат расчетов.

class Math{
    const PI = M_PI; //todo возвращает число пи.
    static function pow($base, $exp){
        return $base ** $exp;
    }
}
echo Math::pow(2,20);
?><br><br><?php
echo "Pi: " . Math::PI;
?><br><br><?php

//todo Laba 1.5 Создание классов в отдельных файлах.



