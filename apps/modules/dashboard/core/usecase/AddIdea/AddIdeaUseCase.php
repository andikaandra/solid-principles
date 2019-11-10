<?php

namespace Phalcon\Init\Dashboard\UseCases\AddIdea;

use Phalcon\Init\Dashboard\Domain\Contracts\Repositories\IdeasRepositoryInterface;

class AddIdeaUseCase
{
    protected $repository;

    public function __construct(IdeasRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute($description)
    {
        return $this->repository->addNewIdea($description);
    }
}