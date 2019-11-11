<?php

namespace Phalcon\Init\Dashboard\Infrastructure\Services;

use Phalcon\Init\Dashboard\Infrastructure\Services\Contracts\MailerServiceInterface;

class MailerService implements MailerServiceInterface
{
    protected $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function createMessage($to, $from, $subject, $body)
    {
        $this->mailer->createMessage($to, $from, $subject, $body);

        return $this;
    }

    public function sendMessage()
    {
        $this->mailer->sendMessage();

        return $this;
    }

    public function setTemplate($template)
    {
        $this->mailer->setTemplate($template);

        return $this;
    }
}