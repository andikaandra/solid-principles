<?php

use Phalcon\Init\Dashboard\Infrastructure\Repositories\AuthorsRepository;
use Phalcon\Init\Dashboard\Infrastructure\Repositories\IdeasRepository;
use Phalcon\Init\Dashboard\Infrastructure\Services\MailerService;
use Phalcon\Init\Dashboard\Infrastructure\Services\SwiftMailer;
use Phalcon\Init\Dashboard\UseCases\AddAuthor\AddAuthorUseCase;
use Phalcon\Init\Dashboard\UseCases\AddIdea\AddIdeaUseCase;
use Phalcon\Init\Dashboard\UseCases\AllIdea\AllIdeaUseCase;
use Phalcon\Init\Dashboard\UseCases\Login\LoginUseCase;
use Phalcon\Init\Dashboard\UseCases\RateIdea\RateIdeaUseCase;

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

$di->setShared('loginUc', function () use ($di) {
    return new LoginUseCase($di->get('authorsRepository'));
});


// idea usecase 
$di->setShared('addNewIdeaUc', function () use ($di) {
    return new AddIdeaUseCase($di->get('ideasRepository'));
});

$di->setShared('allIdeaUc', function () use ($di) {
    return new AllIdeaUseCase($di->get('ideasRepository'));
});

$di->setShared('rateIdeaUc', function () use ($di) {
    return new RateIdeaUseCase($di->get('ideasRepository'), $di->get('mailerService'));
});


$di->set('swiftMailerTransport', function ()  use ($di) {
    $config = $di->get('config');
    $transport = (new Swift_SmtpTransport($config->mail->smtp->server, $config->mail->smtp->port))
        ->setUsername($config->mail->smtp->username)
        ->setPassword($config->mail->smtp->password);

    return $transport;
});

$di->set('swiftMailer', function () use ($di) {
    $mailer = new Swift_Mailer($di->get('swiftMailerTransport'));

    return new SwiftMailer($mailer);
});

$di->set('mailerService', function () use ($di) {
   return new MailerService($di->get('swiftMailer'));
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