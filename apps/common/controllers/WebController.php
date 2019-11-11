<?php

namespace Phalcon\Init\Common\Controllers;
use Phalcon\Mvc\Dispatcher;

class WebController extends BaseController
{

    private $whiteList = array(
        array('module' => 'dashboard', 'controller' => 'author', 'action' => 'login' ),
        array('module' => 'dashboard', 'controller' => 'author', 'action' => 'loginPost' ),
        array('module' => 'dashboard', 'controller' => 'author', 'action' => 'newAuthor' ),
        array('module' => 'dashboard', 'controller' => 'author', 'action' => 'newAuthorPost' ),
        array('module' => 'dashboard', 'controller' => 'dashboard', 'action' => 'index' ),
        array('module' => 'dashboard', 'controller' => 'idea', 'action' => 'rateIdeaPost' ),
        array('module' => 'dashboard', 'controller' => 'idea', 'action' => 'allIdea' )
    );

    protected function setSession($key, $value)
    {
        $this->session->set($key, $value);        
    }

    protected function getSession($key) 
    {
        if ($this->session->has($key)) {
			return $this->session->get($key);
        }
        return null;
    }

    protected function hasSession($key) 
    {
        return $this->session->has($key);
    }

    protected function removeSession($key) 
    {
        $this->session->remove($key);
    }

    protected function isAuthenticated()
    {
        if ($this->hasSession('auth')) {
            return true;
        }
        return false;
    }

    public function isWhiteListResource($moduleName, $controllerName, $actionName)
    {
        foreach ($this->whiteList as $resource) {
            if ($resource['module'] == $moduleName &&
                $resource['controller'] == $controllerName &&
                $resource['action'] == $actionName) {
                return true;
            }
        }
        return false;
    }

    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        $module = $dispatcher->getModuleName();
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        $isWhitelist = $this->isWhiteListResource($module, $controller, $action);

        if ($isWhitelist) {
            return true;
        } else {
            if ($this->isAuthenticated()) {
                return true;
            } else {
                $this->response->redirect($module.'/author/login');
                return false;
            }
        }
    }
}