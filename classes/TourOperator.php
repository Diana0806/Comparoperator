<?php
    class TourOperator {
        private $id;
        private $name;
        private $link;
        private $certificate;
        private $destinations;
        private $reviews;
        private $scores;

        public function __construct($data) {

        }

        public function isPremium() {
            
        }

        public function getId()
        {
                return $this->id;
        }

        public function getName()
        {
                return $this->name;
        }

        public function getLink()
        {
                return $this->link;
        }

        public function getCertificate()
        {
                return $this->certificate;
        }

        public function getDestinations()
        {
                return $this->destinations;
        }

        public function getReviews()
        {
                return $this->reviews;
        }

        public function getScores()
        {
                return $this->scores;
        }
    }