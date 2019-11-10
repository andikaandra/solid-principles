<?php

namespace Phalcon\Init\Dashboard\Domain\Contracts\Repositories;

interface IdeasRepositoryInterface
{
    public function addNewIdea($description);
}
