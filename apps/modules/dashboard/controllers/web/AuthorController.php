<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Init\Common\Controllers\WebController;
use Phalcon\Init\Dashboard\UseCases\AddAuthor\AddAuthorRequest;
use Phalcon\Init\Dashboard\UseCases\Login\LoginRequest;
use Phalcon\Init\Dashboard\Infrastructure\Dto\AuthorDto;

class AuthorController extends WebController
{
    protected $addNewAuthorUc;
    protected $loginUc;
    protected $request;

    public function initialize()
    {
        $this->addNewAuthorUc = $this->di->get("addNewAuthorUc");
        $this->loginUc = $this->di->get("loginUc");
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
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $response = $this->loginUc->execute(new LoginRequest($email, $password));
        if ($response->getError()) {
            $this->flashSession->error($response->getMessage());
            return $this->response->redirect($this->request->getHTTPReferer());
        } else {
            $this->setSession('auth', $response->getData());
            $this->flashSession->success($response->getMessage());
            return $this->response->redirect('');
        }
    }

    public function logoutPostAction()
    {
        $this->removeSession('auth');
        return $this->response->redirect('');
    }
}