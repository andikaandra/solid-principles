<?php


namespace Phalcon\Init\Dashboard\Infrastructure\Dto;


class AllIdeasDto
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getIdeas() : array
    {
        $data = [];
        foreach ($this->data as $idea)
        {
            $data [] = new IdeaData($idea['idea_id'], $idea['title'], $idea['description'], $idea['rating'], $idea['vote'], $idea['author_id'], $idea['author_name']);
        }
        return $data;
    }
}