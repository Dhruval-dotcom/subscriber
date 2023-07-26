<?php

namespace App\Subscriber;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailSubscriber implements EventSubscriberInterface {


    public function __construct(private MailerInterface $mailer, private $email_id)
    {

    }
    public function onEdit()
    {
        $email = (new Email())
            ->from($this->email_id)
            ->to('dhruvaldevaliya1@gmail.com')
            ->subject('About Edited changes')
            ->text('Thank you for creating an account. We hope you enjoy using our site.');

        $this->mailer->send($email);
    }
    public static function getSubscribedEvents()
    {
        return [
            UserCreatedEvent::NAME => 'onEdit',
        ];
    }

}