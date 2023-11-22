<?php
    class Productos
    {
        public $nombre;
        public $precio;
        public $imagen;

        
        public function __construct($nombre, $precio, $imagen)
        {
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->imagen = $imagen;
        }
    }
    $obj_json = json_encode($mercado);
    echo $obj_json;
    ?>