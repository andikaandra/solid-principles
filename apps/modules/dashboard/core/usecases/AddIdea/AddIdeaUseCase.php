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

    public function execute(AddIdeaRequest $request) : AddIdeaResponse
    {
        $title = $request->getTitle();
        $description = $request->getDescription();
        $authorId = $request->getAuthorId();
        try {
            $response = $this->repository->addNewIdea($title, $description, $authorId);
            return new AddIdeaResponse("Idea successfully added.");
        } catch (\Exception $exception) {
            return new AddIdeaResponse($exception->getMessage(), TRUE);
        }
    }
}