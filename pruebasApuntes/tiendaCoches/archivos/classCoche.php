<?php
    class Coche{
        public $name;
        public $price;
        public $color;

        public function __construct($name, $price, $color) {
            $this->name = $name;
            $this->price = $price;
            $this->color = $color;
        }
    }
?>