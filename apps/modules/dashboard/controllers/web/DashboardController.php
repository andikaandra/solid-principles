<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Init\Common\Controllers\WebController;
use Phalcon\Init\Dashboard\Infrastructure\ViewModels\AuthVM;

class DashboardController extends WebController
{
    public function indexAction()
    {
        $this->view->authViewModel = new AuthVM($this->hasSession('auth'));
        $this->view->pick('dashboard/index');
    }
}