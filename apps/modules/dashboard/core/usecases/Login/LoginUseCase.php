<?php

namespace Phalcon\Init\Dashboard\UseCases\Login;

use Phalcon\Init\Dashboard\Domain\Contracts\Repositories\AuthorsRepositoryInterface;

class LoginUseCase
{
    protected $repository;

    public function __construct(AuthorsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(LoginRequest $request) : LoginResponse
    {
        $email = $request->getEmail();
        $password = $request->getPassword();
        try {
            $author = $this->repository->getAuthor($email, $password);
            if ($author->getId()) {
                return new LoginResponse('Successfully Login', $author);
            }
            return new LoginResponse('Wrong Credential', NULL, TRUE);
        } catch (\Exception $exception) {
            return new LoginResponse($exception->getMessage(), NULL, TRUE);
        }
    }
}