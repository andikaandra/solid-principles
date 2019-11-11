<?php

use Phalcon\Init\Dashboard\Infrastructure\Repositories\AuthorsRepository;
use Phalcon\Init\Dashboard\Infrastructure\Repositories\IdeasRepository;
use Phalcon\Init\Dashboard\UseCases\AddAuthor\AddAuthorUseCase;
use Phalcon\Init\Dashboard\UseCases\AddIdea\AddIdeaUseCase;
use Phalcon\Init\Dashboard\UseCases\AllIdea\AllIdeaUseCase;

use Phalcon\Escaper;
use Phalcon\Http\Request;
use Phalcon\Http\Response;
use Phalcon\Flash\Session as FlashSession;

// repositories 
$di->setShared('authorsRepository', function () {
    return new AuthorsRepository();
});

$di->setShared('ideasRepository', function () {
    return new IdeasRepository();
});


// author usecase 
$di->setShared('addNewAuthorUc', function () use ($di) {
    return new AddAuthorUseCase($di->get('authorsRepository'));
});


// idea usecase 
$di->setShared('addNewIdeaUc', function () use ($di) {
    return new AddIdeaUseCase($di->get('ideasRepository'));
});

$di->setShared('allIdeaUc', function () use ($di) {
    return new AllIdeaUseCase($di->get('ideasRepository'));
});


// phalcon library 
$di->set('request', function () {
    return new Request();
});

$di->set('response', function () {
    return new Response();
});

$di->set('flash', function () use ($di) {
    $escaper   = new Escaper();
    return new FlashSession($escaper, $di->get('session'));
});