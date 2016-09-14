<?php
class Player
{
    public $name;
    public $action;

    function __construct($name, $action)
    {
        $this->name = $name;
        $this->action = $action;
    }

    function save()
    {
        $_SESSION['collection'] = $this;
    }

    static function deleteAllCollection()
    {
        $_SESSION['collection'] = "";
    }

    static function getPlayer(){
        return $_SESSION['collection'];
    }
}
 ?>
