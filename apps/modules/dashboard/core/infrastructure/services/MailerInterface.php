<?php

namespace Phalcon\Init\Dashboard\Infrastructure\Services;

interface MailerInterface
{
    public function createMessage($to, $from, $subject, $body);
    public function sendMessage();
    public function setTemplate($template);
}