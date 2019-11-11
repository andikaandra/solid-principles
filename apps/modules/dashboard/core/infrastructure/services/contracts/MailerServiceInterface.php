<?php

namespace Phalcon\Init\Dashboard\Infrastructure\Services\Contracts;

interface MailerServiceInterface
{
    public function createMessage($to, $from, $subject, $body);
    public function sendMessage();
    public function setTemplate($template);
}