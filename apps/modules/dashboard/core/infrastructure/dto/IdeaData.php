<?php


namespace Phalcon\Init\Dashboard\Infrastructure\Dto;


class IdeaData
{
    protected $id;
    protected $title;
    protected $description;
    protected $rating;
    protected $authorId;
    protected $authorName;

    public function __construct($id, $title, $description, $rating, $authorId, $authorName)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->rating = $rating;
        $this->authorId = $authorId;
        $this->authorName = $authorName;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }
    
    public function getDescription()
    {
        return $this->description;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function getAuthorName()
    {
        return $this->authorName;
    }
}