<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;


class SendMailService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)   //creer mon constructeur 
    {
        $this->mailer = $mailer;
    }

    public function send(                                 // envoyer un mail avec la méthode send
        string $from,                                     // j'ajoute les paramètres en entrée pour mon mail
        string $to,
        string $subject,
        string $template,
        array $context

    ): void {
        // Je crée le mail
        $email = (new TemplatedEmail())
            ->from($from)
            ->to($to)
            ->subject($subject)
            ->htmlTemplate("emails/$template.html.twig")
            ->context($context);

        // j'envoie le mail
        $this->mailer->send($email);
    }
}