<?php
    class Destination extends Manager {
        private $id;
        private $location;
        private $price;
        protected $table = "destination";

        public function __construct() {
                parent::__construct();
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