<?php

namespace Phalcon\Init\Dashboard\Infrastructure\Repositories;

class IdeasRepository implements IdeasRepositoryInterface
{
    public function __construct()
    {

    }

    public function addNewIdea($description)
    {
        return $description;
    }
}