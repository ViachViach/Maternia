<?php

declare(strict_types=1);

namespace App\Service;

use App\Exceptions\EmailNotFound;
use App\PublicInterface\SenderInterface;
use Swift_Mailer;
use Swift_Message;

class MailService implements SenderInterface
{

    private Swift_Mailer $mailer;

    /**
     * MailService constructor.
     *
     * @param Swift_Mailer $mailer
     */
    public function __construct(Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param string $mailTo
     */
    public function send(string $mailTo): void
    {
        if (empty($mailTo)) {
            throw new EmailNotFound();
        }

        $message = (new Swift_Message('Remember'))
            ->setFrom('send@example.com')
            ->setTo($mailTo)
            ->setBody('Some text which remember customer about lenses');

        $this->mailer->send($message);
    }
}
