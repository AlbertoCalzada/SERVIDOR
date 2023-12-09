<?php
class Usuario
{
    public $name;
    public $pass;
    public $rol;
    public $money;

    public function __construct($name, $pass)
    {
        $this->name = $name;
        $this->pass = $pass;
        $this->rol=0;
        $this->money=1000000;
       
    }

    function setRol($rol)
    {
        $this->rol=$rol;
    }
}
