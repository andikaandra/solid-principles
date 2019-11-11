<?php


namespace Phalcon\Init\Dashboard\UseCases\Login;


class LoginResponse
{
    protected $message;
    protected $error;

    public function __construct($message = NULL, $data = NULL, $error = NULL)
    {
        $this->message = $message;
        $this->error = $error;
        $this->data = $data;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getError()
    {
        return $this->error;
    }
}