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
        //  в виде конкатенации строк.
        echo $this->name . "said $word";
        // todo или тоже самое в экранированном виде.
        echo "{$this->name} said $word\n";
        // todo Также внутри метода можно обращаться к другим методам класса.
        $this->startEngine();
    }
}

$london = new Ship();
$london->name = "Sailor Moon";
echo $london->say("Once ready");

// todo Использование псевдоконсант (магических констант) в классах.

class MagicClass{
    function saySimon(){
        // todo вернет имя функции
        echo "<p>Function name " . __FUNCTION__;
    }
        // todo вернет имя класса
    function className(){
        echo "<p>Class name " . __CLASS__;
    }
        // todo вернет имя класса и метода
    function methodName(){
        echo "<p>Method name " . __METHOD__;
    }
}
$obj = new MagicClass();
$obj->saySimon();
$obj->className();
$obj->methodName();

?><br><br>
<?php
// todo Конструкторы и деструкторы

class Gear{
    public $name;
    public $age = 0;
    function __construct(){ // todo метод конструктор.
        echo "Created new object - class Gear";
        ?><br><br><?php
    }
}
// todo Сразу при создании объекта выполнилась функция __construct.
$reductionGear = new Gear();
$amplifier = new Gear();

class Box{
    public $size;
    public $weight = 0;
    // todo так же можно указать параметры функции конструктора и тогда
    //  при создании экземпляра класса (объекта) можно будет указать нужные данные
    //  как аргументы.
    function __construct($size, $weight){
        $this -> size = $size;
        $this -> weight = $weight;
        echo "New box created with size: {$size} m and weight: {$weight} kg";
        ?><br><br><?php
    }
}

$someBox = new Box('0.2x0.3x0.4', '12');
echo $someBox->weight; //12
echo $someBox->size; // 0.2x0.3x0.4



// todo Клонирование объектов
// todo Копирование значений переменных всех типов, кроме объектов
$x = 10;
$y = $x; // $y - копия $x
$y = 20;
?><br><br><?php
echo $y; // 20
?><br><br><?php
echo $x; // 10
?><br><br><?php

// todo Создание ссылок для всех типов, кроме объектов
$x = 11;
$z = &$x; // $z - ссылка на $x
$z = 20;
echo $z; // 20
echo $x; // 20

class MyClass{
    public $param;
    function __construct($param){
        $this->param = $param;
    }
    //todo магический метод __clone позволяет автоматически исполнить
    //  некоторый код в случае клонирования объекта.
    // Важный момент, никаких параметров задать в этот метод нельзя.
    function __clone(){
        echo "Object cloned";
    }
}
// todo Создание объекта
$objX = new MyClass(10);
//todo $objX - это объект, он не хранит
//   в себе данные, а лишь ссылку на область памяти где они хранятся.
$objY = $objX; // todo в этом случае не происходит копирования данных,
//todo а создаётся еще одна ссылка к той же области памяти. то есть
//  изменяя значение одного объекта измениться значение и второго.

//todo Клонирование объектов.
//  Если мы хотим получить другой объект ссылающийся на другую область памяти
// но содержащий ту же информацию, то используем ключевое слово clone.

$objZ = clone $objX; // todo $objZ является полной копией $objX и отдельным объектом.
// todo изменение  $objZ никак не влияет на $objX.
$objZ->param = 30;
echo $objX->param; // 20

// todo Наследование классов
//  В ООП есть возможность описать (базовый класс) супер класс
//  и его при необходимости наследовать.
//  Создание супер-класса
class SimpleHouse{
    public $model = "";
    public $squire = 0;
    public $floors = 0;
    public $color = "none";
    function __construct($model, $square = 0, $floors = 1){
        $this->model = $model;
        $this->square = $square;
        $this->floors = $floors;
    }
    function startProject(){
        echo "Start. Model: {$this->model}\n";
    }
    function stopProject(){
        echo "Stop. Model: {$this->model}\n\n";
    }
    function build(){
        echo "Build. House: {$this->square}x{$this->floors}\n";
    }
    function paint(){
        echo "Paint. Color: {$this->color}\n";
    }
}
//todo Создание простого дома - экземпляра класса (object).
$simple = new SimpleHouse("A-100-123", 120, 2);
$simple->color = "red";
$simple->startProject();
$simple->build();
$simple->paint();
$simple->stopProject();

//todo Создание класса-наследника при помощи ключевого слова extends.
//  в этом случае мы создаём новый класс SuperHouse который наследует(содержит)
//  все параметры и методы родительского класса или супер класса SimpleHouse
//  плюс обладает своими дополнительными параметрами и методами.
class SuperHouse extends SimpleHouse{
    public $fireplace = true;
    public $patio = true;
    function fire(){
        if ($this->fireplace)
            echo "Fueled fireplace\n";
    }
}

// todo Абстрактные классы и методы
//  Первое главное отличие - Невозможно создать экземпляр абстрактного класса.
//  Задача абстрактного класса в том чтобы на его основе создавать другие классы.
abstract class HouseAbstract{
    public $model = "";
    public $square;
    public $floors;

    function __construct($model, $square = 0, $floors = 1){
        if (!$model)
            throw new Exception("Error! Assign model!");
        $this->model = $model;
        $this->square = $square;
        $this->floors = $floors;
    }

    function startProject(){
        echo "Start. Model: {$this->model}\n";
    }
    function stopProject(){
        echo "Stop. Model: {$this->model}\n";
    }
    //todo Абстрактный метод
    abstract function build();
}
// todo  Создание класса наследника абстрактного класса.
class NewHouse extends HouseAbstract{
    public $color = "none";
    //todo Обязательная реализация абстрактного метода
    function build()
    {
        echo "Build. House: {$this->square}x{$this->floors}";
    }
    //todo  Свой метод
    function paint(){
        echo "Paint. Color: {$this->color}\n";
    }
}
// todo Создание экземпляра класса (объекта)

$simple = new NewHouse("A-11-23", "180", "2");
?><br><?php
$simple->build();


//todo Интерфейсы
// todo Создаётся при помощи ключевого слова interface.
//  Для того чтобы писать строгий абстрактный код существует понятие интерфейс.
//  В php это абстрактный класс который содержит только абстрактные методы.
//  Писать в таком классе abstract перед function не нужно.
//  С помощью interface описывают содержимое, поведение того или иного
//  будущего класса.
//  то есть ввести стандарт на наименование методов, на то какие параметры в них
//  приходят. Программируйте на уровне интерфейса, а реализуйте на уровне класса.

// todo Создаём класс interface.
interface Paintable{
    function paint();
}
interface Brick{};
interface Panel{};

//todo Создаём абстрактный класс, со своими методами и конструктором.
abstract class DomAbstract{
    public $model = "";
    public $square;
    public $floors;

    function __construct($model, $square = 0, $floors = 1){
        if (!$model)
            throw new Exception('Ошибка! Укажите модель!');
        $this->model = $model;
        $this->square = $square;
        $this->floors = $floors;
    }
    function startProject(){
        echo "Start. Model: {$this->model}\n";
    }
    function stopProject(){
        echo "Stop. Model: {$this->model}\n\n";
    }
    abstract function build();
}

// todo Интрефейсы не наследуются а реализуются с помощью ключевого
//  слова implements.
//  в данном случае создаём class SimpleDom который наследует абстрактный класс
//  DomAbstract и интерфейс Paintable. Все методы унаследованные из абстрактного
//  класса и из интерфейса обязательны к реализации.
class SimpleDom extends DomAbstract implements Paintable{
    public $color = "none";
    function build()
    {
        echo "Build.House: {$this->square}x{$this->floors}";

    }
    function paint()
    {
        echo "Paint.House: {$this->color}";
    }
}
//todo Создаём экземпляр получившегося класса.
$domSea = new SimpleDom("sea","340", "2");
$domSea->color= "blue";
$domSea->build();
$domSea->paint();
//todo Класс может реализовывать любое число интерфейсов. Если он их реализует
// он должен описать все методы этих интерфейсов.
// всё это для стандартизации.
class MediumDom extends DomAbstract implements Paintable, Brick{
    function build()
    {
        // TODO: Implement build() method.
    }
    function paint()
    {
        // TODO: Implement paint() method.
    }
}

//todo Проверка класса в цепочке предков.
// При помощи оператора instanceof можно создать условие для
// проверки объекта, на тот факт является ли он наследником некоего
// абстрактного класса или интерфейса. И если да, то запустить соответствующие
// методы.
// Нужно это в тех ситуациях когда нужно написать метод для объекта, для которого
// еще не написан соответствующий класс или интерфейс. Или ты его не можешь видеть.
if ($domSea instanceof Paintable)
    $domSea->paint();
    $domSea->stopProject();

// todo Если абстрактный класс это что то вроде наброска чертежа, то интерфейс,
//  это еще более схематичная сущность.

//todo Константы и статические члены класса
// Свойства это по сути переменные экземпляров класса, а
// вот константы это константы класса, то есть она одна на всех,
// она не принадлежит объектам, к ней нельзя обратиться через объект.
class ConstructionCompany{
    const NAME = "Horns and Hooves";

    function printName(){
        //todo Обращение к константе из метода класса.
        // то есть изнутри класса, в его области видимости.
        // тут важно понимать что константы класса принадлежат только
        // классу и не принадлежат к к объектам (экземплярам класса).
        // К константе нельзя обратиться из объекта, из объекта можно
        //  обратиться только к свойствам (переменным класса).
        // Соответственно для обращения к константе нельзя использовать
        // ключевое слово this (переменная), а только слово self (сам класс)
        echo self::NAME;
    }
}

//todo Обращение к константе вне области видимости класса, но без создания
// экземпляра класса.
 echo ConstructionCompany::NAME;
//todo чтобы обратиться к константе из переменной, нужно создать специальный
// метод в родительском классе и уже обращаться к исполнению метода из под объекта.
$company = new ConstructionCompany();
$company->printName(); //todo В этом случае отработает метод, в котором есть обращение к константе.
