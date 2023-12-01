<?php


    class Contacto
    {
        public $nombre;
        public $telefono;

        
        public function __construct($nombre, $telefono)
        {
            $this->nombre = $nombre;
            $this->telefono = $telefono;
        }
    }
 
    ?>