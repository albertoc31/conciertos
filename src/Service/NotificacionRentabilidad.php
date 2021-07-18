<?php


namespace App\Service;


use App\Entity\Concierto;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\Recipient\Recipient;

class NotificacionRentabilidad
{
    private $notifier;

    public function __construct(NotifierInterface $notifier)
    {
        $this->notifier = $notifier;
    }


    public function sendEmailRentabilidad(Concierto $concierto)
    {
        $message = sprintf('El concierto %s de fecha %s ha tenido una rentabilidad de %s €',
            $concierto->getName(),
            $concierto->getFecha()->format('d-m-Y'),
            $concierto->getRentabilidad()
        );

        $notification = (new Notification('Rentabilidad de Concierto', ['email']))
            ->content($message);

        /* aqui nos falta el mail del promotor que no estaba contemplado en la bbdd.
        Asumimos que se debería incluir en una nueva propiedad $email */

        // $email = $concierto->getPromotor()->getEmail()

        $email = 'albertoc31@gmail.com';

        $recipient = new Recipient(
            $email,
            ''
        );

        $this->notifier->send($notification, $recipient);

        return;
    }

}