<?php
    class Score {
        private $id;
        private $value;
        private $author;

        public function __construct($data) {
            
        }

        public function getId()
        {
                return $this->id;
        }

        public function getValue()
        {
                return $this->value;
        }

        public function getAuthor()
        {
                return $this->author;
        }
    }