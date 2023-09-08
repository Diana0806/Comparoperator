<?php

class Rating extends Manager
{
    private $id;
    private $message;
    private $tourOperatorId;
    private $authorName;
    private $rating;

    // Les méthodes getters et setters pour les propriétés

    public function __construct($data) {
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

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getTourOperatorId()
    {
        return $this->tourOperatorId;
    }

    public function setTourOperatorId($tourOperatorId)
    {
        $this->tourOperatorId = $tourOperatorId;
    }

    public function getAuthorName()
    {
        return $this->authorName;
    }

    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }
}
