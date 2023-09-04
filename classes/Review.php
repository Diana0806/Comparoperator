<?php
    class Review {
        private $id;
        private $message;
        private $author;

        public function __construct($data) {
            
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