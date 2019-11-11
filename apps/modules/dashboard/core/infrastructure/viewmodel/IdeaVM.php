<?php

namespace Phalcon\Init\Dashboard\Infrastructure\ViewModels;


class IdeaVM
{
    protected $ideas;

    public function __construct($ideas)
    {
        $this->ideas = $ideas;
    }

    public function getIdeas()
    {
        return $this->ideas->getIdeas();
    }

}