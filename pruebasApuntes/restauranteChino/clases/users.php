<?php
class User
{
    public $name;
    public $pass;
    public $rol; //0 es cliente 1 es personal y 2 administrador.
    public $busy; //0 esta libre, 1 ocupado

    public function __construct($name, $pass,$rol)
    {
        $this->name = $name;
        $this->pass = $pass;
        $this->rol = $rol;
    }

    

    
}
