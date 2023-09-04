<?php
    class Review extends Manager{
        private $id;
        private $message;
        private $author;

        public function __construct() {
                
        }

        public function getId()
        {
                return $this->id;
        }

        public function getMessage()
        {
                return $this->message;
        }

        public function getAuthor()
        {
                return $this->author;
        }
    }