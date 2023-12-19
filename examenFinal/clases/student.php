<?php
class Student
{
    public $puntuacion;
    public $name;
    public $password;



    public function __construct($name, $password)
    {

        $this->name = $name;
        $this->password = $password;
    }
   
}
