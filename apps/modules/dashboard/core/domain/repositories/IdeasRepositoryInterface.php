<?php

namespace Phalcon\Init\Dashboard\Domain\Contracts\Repositories;

interface IdeasRepositoryInterface
{
    public function addNewIdea($title, $description, $authorId);
    public function allIdea();
}
