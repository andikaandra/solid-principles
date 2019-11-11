<?php

namespace Phalcon\Init\Dashboard\UseCases\AllIdea;

use Phalcon\Init\Dashboard\Domain\Contracts\Repositories\IdeasRepositoryInterface;

class AllIdeaUseCase
{
    protected $repository;

    public function __construct(IdeasRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        return $this->repository->allIdea();
    }
}