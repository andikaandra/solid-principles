<?php

namespace Phalcon\Init\Dashboard\UseCases\AddAuthor;

class AddAuthorRequest
{
    protected $name;
    protected $email;
    protected $password;
    protected $passwordRepeat;

    public function __construct($name, $email, $password, $passwordRepeat)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPasswordRepeat()
    {
        return $this->passwordRepeat;
    }
}