<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Init\Common\Controllers\WebController;
use Phalcon\Init\Dashboard\UseCases\AddIdea\AddIdeaRequest;
use Phalcon\Init\Dashboard\Infrastructure\ViewModels\IdeaVM;

class IdeaController extends WebController
{
    protected $addNewIdeaUc;
    protected $allIdeaUc;
    protected $request;

    public function initialize()
    {
        $this->addNewIdeaUc = $this->di->get("addNewIdeaUc");
        $this->allIdeaUc = $this->di->get("allIdeaUc");
        $this->request = $this->di->get('request');
    }

    public function newIdeaAction()
    {
        $this->view->pick('idea/new');
    }

    public function newIdeaPostAction()
    {
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $authorId = $this->request->getPost('author');
        $response = $this->addNewIdeaUc->execute(new AddIdeaRequest($title, $description, $authorId));
        if ($response->getError()) {
            $this->flashSession->error($response->getMessage());
            return $this->response->redirect($this->request->getHTTPReferer());
        } else {
            $this->flashSession->success($response->getMessage());
            return $this->response->redirect('');
        }
    }

    public function allIdeaAction()
    {
        $ideas = $this->allIdeaUc->execute();
        $this->view->ideaViewModel = new IdeaVM($ideas);
        $this->view->pick('idea/all');
    }
}