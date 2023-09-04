<?php
    class Destination {
        private $id;
        private $location;
        private $price;

        public function __construct($data) {
            
        }

        public function getId()
        {
                return $this->id;
        }

        public function getLocation()
        {
                return $this->location;
        }

        public function getPrice()
        {
                return $this->price;
        }
    }