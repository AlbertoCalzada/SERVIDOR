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
    $producto= new Producto();
    
    $obj_json = json_encode($tienda);
    echo $obj_json;
    ?>