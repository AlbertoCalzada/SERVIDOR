<?php
    class Product{
        public $name;
        public $price;
        public $path_img;

        public function __construct($name, $price, $path_img) {
            $this->name = $name;
            $this->price = $price;
            $this->path_img = $path_img;
        }
    }
?>