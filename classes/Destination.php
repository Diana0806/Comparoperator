<?php
    class Destination extends Manager {
        protected $id;
        protected $location;
        protected $price;
        protected $image;

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

        public function getImage()
        {
                return $this->image;
        }
    }