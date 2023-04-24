<?php

namespace App\NotificationChannels;

use Illuminate\Notifications\Notification;

class LankabellSmsChannel
{
    private $lankabell;

    public function __construct(LankabellSmsClient $client)
    {
        $this->lankabell = $client;
    }

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        if (!$to = $notifiable->routeNotificationFor('lankabell')) {
            return;
        }

        $message = $notification->toLankabell($notifiable);

        if (is_string($message)) {
            $message = new LankabellSmsMessage($message);
        }

        $this->lankabell->send($to, $message->getContent());
    }
}
