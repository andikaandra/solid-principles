<?php

namespace Phalcon\Init\Dashboard\Infrastructure\ViewModels;


class AuthVM
{
    protected $isAuthenticated;
    protected $user;

    public function __construct($isAuthenticated, $user = NULL)
    {
        $this->isAuthenticated = $isAuthenticated;
        $this->user = $user;
    }

    public function getIsAuthenticated()
    {
        return $this->isAuthenticated;
    }

    public function getUser()
    {
        return $this->user;
    }

}