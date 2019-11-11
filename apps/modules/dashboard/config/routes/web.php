<?php

$namespace = 'Phalcon\Init\Dashboard\Controllers\Web';

$router->addGet('/dashboard/idea/new', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'idea',
    'action' => 'newIdea'
]);