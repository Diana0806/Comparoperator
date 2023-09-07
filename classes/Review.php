<?php
    class Review extends Manager{
        protected $id;
        protected $message;
        protected $author;

        public function __construct() {
                parent::__construct();
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