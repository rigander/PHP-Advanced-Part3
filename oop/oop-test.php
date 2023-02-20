<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OOP</title>
</head>
<body style="background-color: #3c3f41; padding: 10px; color: #bd6f31; font-size: 25px;">

</body>
</html>
<?php

// todo Пример самого простого класса. (шаблона для исполнения экземпляров).
//  технически от этого пустого класса можно
//  создавать объект ( экземпляр класса).
class Pet{
    // todo тело класса
}
// todo Экземпляр класса, то есть конкретный объект создаётся
//  с помощью оператора new. В данном случае создали две сущности
//  с типом object и свойствами класса Pet.
//  другими словами присвоили объектам собака и кошка класс дом.
//  питомцы.
$cat = new Pet();
$dog = new Pet();

// todo Проверим (gettype() - узнать тип данных,
//  is_object - это объект? - 1 - да, 0 - нет.
echo gettype($cat); // object
?><br><br>
<?php
echo is_object($dog); // 1

// todo У каждого класса в php есть свойства - это параметры,
//  которые хранят состояние объекта.
//  свойства в php в классе это обычные переменные.
//  но чтобы не путать все переменные в теле класса это свойства класса,
//  а вот вне класса это переменные, или объекты (экземпляры класса)
class Animal{
    // todo У всех свойств класса есть модификатор доступа.
    //  модификатора по-умолчанию нет поэтому его нужно указывать явно.
    //  public - модификатор всем все можно, без ограничений.
    public $name;
    public $age = 0;
    public $type = "living thing";
}
// todo У переменных $lion и $wolf как у экземпляров
//  класса Animal существует свойство $name со значением по умолчанию null.
//  и свойство $age со значением по-умолчанию 0.
//   То есть объекты сразу содержат встроенные свойства.
$lion = new Animal();
$wolf = new Animal();
?><br><br>
<?php
// todo синтаксис для обращения к свойству age объекта $wolf.
echo $wolf->age; // 0
?><br><br>
<?php
// todo синтаксис изменения значения свойства объекта.
//   свойства удерживают состояние объекта.
$wolf->name = "Jack";
echo $wolf->name; // Jack
echo $wolf->type; // living thing
$wolf->type = "canis lupus";
echo $wolf->type;  // canis lupus
echo $lion->type;  // living thing

?><br><br>
<?php
// todo У объекта может быть поведение(действие).
//   Поведение объекта описывается МЕТОДАМИ.
//   МЕТОД это обычная функция которая указывается (декларируется) внутри класса.
//   Например, человек - ходит, спит, ест.
//   Автомобиль - ездит, ускоряется, замедляется.

class Vehicle{
    public $type = "car";
    public $color = "red";
    function say(){ echo "I am method"; } // МЕТОД
    function sayHi($hi){ echo $hi; }
}

$Mitsubishi = new Vehicle();
echo $Mitsubishi->say(); // вызов метода экземпляра класса
echo $Mitsubishi->sayHi("hello-again"); // hello-again
?><br><br>
<?php
// todo Обращение к свойствам и методам внутри класса
class Ship{
    public $name = "Astra";
    public $age = 0;
    function startEngine(){
     echo "Start Main Engine";
    }
    function say($word){
        // todo Доступ к свойству, где $this - это имя экземпляра класса.
        //  name - это одно из свойств будущего экземпляра класса.
        echo $this->name . "said $word";
        // todo Также внутри метода можно обращаться к другим методам класса.
        $this->startEngine();
    }
}

$london = new Ship();
$london->name = "Sailor Moon";
echo $london->say("Once ready");



