<?php

namespace Phalcon\Init\Dashboard\UseCases\RateIdea;

class RateIdeaRequest
{
    protected $ideaId;
    protected $rating;

    public function __construct($ideaId, $rating)
    {
        $this->ideaId = $ideaId;
        $this->rating = $rating;
    }

    public function getIdeaId()
    {
        return $this->ideaId;
    }
    
    public function getRating()
    {
        return $this->rating;
    }

}