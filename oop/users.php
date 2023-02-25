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
function br(){
    ?><br><br><?php
}


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
//  done.

//todo Модификаторы доступа к свойствам и методам.

class ParentClass{
  public $public = 1; //todo Разрешает всё.

  protected $protected = 2; //todo Запрещает обращение из вне класса.
                            // доступ возможен из самого класса или из наследника.

  private $private = 3; //todo

  function getProtected(){ //todo Для того чтобы получить доступ к protected свойству
                           // из объекта, нужно уложить это в public метод в классе.
      return $this->protected;
  }
  function getPrivate(){
      return $this->private;
  }
}
$parent = new ParentClass();
echo $parent->getProtected();
br();

//todo Модификаторы доступа не имеют ничего общего с безопасностью. Их цель
// в том чтобы разработчики могли видеть какие свойства и методы для них
// а какие для более ограниченного пользования.
// Например нужно задать возможность влиять на регистр свойств всех объектов
// и дочерних классов.

class Names{
    private $_name;
    function setName($v){ //todo В таком случае можно менять регистр сразу всех
                          // объектов. Так как к самому свойству _name у объектов
                          // доступа нет. А задать имя можно только через метод.
                          // Изменив в методе порядок записи имени, все имена
                          // перейдут в верхний регистр.
        $this->_name = strtoupper($v);
    }
    function getName(){
        return $this->_name;
    }
}

//todo По большому счету делать свойства общедоступными не удобно. Так как
// потом сложно контролировать их использование в проекте. Всё это нужно лишь
// для контроля и структуризации проекта, что бы случайно не меняли свойства и методы.


//todo Так же могут быть свойства которые вы бы хотели чтобы их можно было задавать
// лишь единожды и больше изменить нельзя. Например...

class Ages{
    //todo В данном случае при создании объекта нужно будет указать параметр возраст.
    // И так как он private, а доступ у нему есть лишь через конструктор, то изменить
    // это свойство для конкретного объекта уже будет нельзя.
    private $_age;
    function __construct($a){
        $this->_age = $a;
    }
    function showAge(){
        echo $this->_age;
    }
}
$u1 = new Ages(25);
$u1->showAge();
br();

//todo Доступ к недоступным свойствам и методам
// Свойство может быть недоступным либо если его нет вообще
// либо если к нему закрыт доступ.

class Existence{};
$Acs = new Existence();
// $Acs ->func(); //todo Error! Method does not exist.
$Acs->param = 100; //todo Хотя объект был пуст, мы создали новое свойство,
                   // что не всегда желательно.
echo $Acs->param;
br();

//todo Чтобы сделать нормальные геттеры и сеттеры, чтобы можно было работать
// как со свойствами. И не даём создавать то что нельзя создавать.
// Когда php обращается к методу или свойству которое не существует или
// заблокировано, то php перед тем как выдать ошибку проверяет класс  на наличие
// логического метода __set(); И если такой метод описан в классе, то php при попытке
// обратиться к любому свойству сначала прогонит название и значение свойства через метод
// __set (в его аргументы).

class setUserParam{
    private $_name;
    private $_age;
    //todo Если пользователь обращается на запись.
    // При использовании магического метода __set выполниться код в его теле.
    // А аргументами будут приняты имя и значение свойства.
    // Например, в данном случае из под объекта можно задать лишь свойства имя и возраст,
    // а при попытке задать любое другое свойство выйдет ошибка.
    function __set($n, $v){
        switch ($n){
            case "name": $this->_name = $v; break;
            case "age": $this->_age = $v; break;
            default: throw new Exception("Error! Property does not exist");
        }
    }
    function showNameAge(){
        echo "User name: " . $this->_name . " and User age: " . $this->_age;
    }
    //todo Если пользователь обращается на чтение. А свойства нету, то прежде чем
    //  создавать это свойство php проверяет наличие магического метода __get.
    // И если такой метод описан, то PHP передаст в аргументы имя свойства. И
    // исполняет код в методе.
    function __get($n){
        switch ($n){
            case "name": return $this->_name; break;
            case "age": return $this->_age; break;
            default: throw new Exception("Error!");
        }
    }
}

$newUser = new setUserParam();
$newUser->name = "Kyle";
$newUser->age = 82;
echo $newUser->showNameAge();
br();
echo $newUser->name;
echo $newUser->age;
br();
//todo При таком подходе не случайно не абы как пользователь (разработчик) ничего не делает.
// Все под контролем и только в разрешенных пределах.
