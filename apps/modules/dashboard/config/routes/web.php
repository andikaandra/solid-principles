<?php

$namespace = 'Phalcon\Init\Dashboard\Controllers\Web';


// auhor route 
$router->addGet('/dashboard/author/new', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'author',
    'action' => 'newAuthor'
]);

$router->addPost('/dashboard/author/new', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'author',
    'action' => 'newAuthorPost'
]);

$router->addGet('/dashboard/author/login', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'author',
    'action' => 'login'
]);

$router->addPost('/dashboard/author/login', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'author',
    'action' => 'loginPost'
]);


// idea route 
$router->addGet('/dashboard/idea/new', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'idea',
    'action' => 'newIdea'
]);

$router->addPost('/dashboard/idea/new', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'idea',
    'action' => 'newIdeaPost'
]);

$router->addGet('/dashboard/idea/all', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'idea',
    'action' => 'allIdea'
]);