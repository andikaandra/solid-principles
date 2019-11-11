<?php

namespace Phalcon\Init\Dashboard\UseCases\AddIdea;

class AddIdeaRequest
{
    protected $title;
    protected $description;
    protected $authorId;

    public function __construct($title, $description, $authorId)
    {
        $this->title = $title;
        $this->description = $description;
        $this->authorId = $authorId;
    }

    public function getTitle()
    {
        return $this->title;
    }
    
    public function getDescription()
    {
        return $this->description;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

}