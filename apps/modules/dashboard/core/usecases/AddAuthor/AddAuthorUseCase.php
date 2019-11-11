<?php

namespace Phalcon\Init\Dashboard\UseCases\AddAuthor;

use Phalcon\Init\Dashboard\Domain\Contracts\Repositories\AuthorsRepositoryInterface;

class AddAuthorUseCase
{
    protected $repository;

    public function __construct(AuthorsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(AddAuthorRequest $request) : AddAuthorResponse
    {
        $name = $request->getName();
        $email = $request->getEmail();
        $password = $request->getPassword();
        $passwordRepeat = $request->getPasswordRepeat();
        if ($password !== $passwordRepeat) {
            return new AddAuthorResponse('Password not match', TRUE);
        }
        try {
            $response = $this->repository->addNewAuthor($name, $email, $password);
            return new AddAuthorResponse($response);
        } catch (\Exception $exception) {
            return new AddAuthorResponse($exception->getMessage(), TRUE);
        }
    }
}