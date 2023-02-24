<?php
class SuperUser extends User{
    public $role = "unknown";
    public static $superCount = 0;
    function __construct($name, $login, $password, $role){
        $this->role = $role;
        ++self::$superCount;
        parent::__construct($name, $login, $password);
    }
    function showInfo(){
        parent::showInfo();
        echo "user role : {$this->role}";
        ?><br><?php
    }
    public static function showAmountOfSuperUsers()
    {
        echo "Total amount of SuperUsers: " . self::$superCount;
    }
}