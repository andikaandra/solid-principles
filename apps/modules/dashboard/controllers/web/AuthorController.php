<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Init\Common\Controllers\WebController;
use Phalcon\Init\Dashboard\UseCases\AddAuthor\AddAuthorRequest;

class AuthorController extends WebController
{
    protected $addNewAuthorUc;
    protected $request;

    public function initialize()
    {
        $this->addNewAuthorUc = $this->di->get("addNewAuthorUc");
        $this->request = $this->di->get('request');
    }

    public function newAuthorAction()
    {
        $this->view->pick('author/new');
    }

    public function newAuthorPostAction()
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $passwordRepeat = $this->request->getPost('password-repeat');
        $response = $this->addNewAuthorUc->execute(new AddAuthorRequest($name, $email, $password, $passwordRepeat));
        if ($response->getError()) {
            $this->flashSession->error($response->getMessage());
            return $this->response->redirect($this->request->getHTTPReferer());
        } else {
            $this->flashSession->success($response->getMessage());
            return $this->response->redirect('dashboard/author/login');
        }
    }

    public function loginAction()
    {
        $this->view->pick('author/login');
    }

    public function loginPostAction()
    {
        $this->send($this->request->getPost());
    }
}