<?php

namespace Phalcon\Init\Dashboard\Domain\Contracts\Repositories;

interface AuthorsRepositoryInterface
{
    public function addNewAuthor($name, $email, $password);
    public function getAuthor($email, $password);
}
