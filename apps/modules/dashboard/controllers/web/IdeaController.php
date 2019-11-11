<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Init\Common\Controllers\BaseController;

class IdeaController extends BaseController
{
    public function newIdeaAction()
    {
        $this->send(array('aa' => "wuaa"));
    }
}