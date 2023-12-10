<?php
class Usuario
{
    public $name;
    public $pass;
    public $rol; //si es 1 sera administrador
    public $money;

    public function __construct($name, $pass,$rol)
    {
        $this->name = $name;
        $this->pass = $pass;
        $this->rol = $rol;
        $this->money = 1000000;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function getRol()
    {
        return $this->rol;
    }
}
