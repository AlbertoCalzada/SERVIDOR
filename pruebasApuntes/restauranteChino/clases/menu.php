<?php
    class Menu{
        public $name;
        public $primero;
        public $segundo;
        public $postre;
  

        public function __construct($name, $primero,$segundo,$postre) {
            $this->name = $name;
            $this->primero = $primero;
            $this->segundo = $segundo;
            $this->postre = $postre;
        }
        
        
    }
?>