<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;

class CustomNotification extends Notification implements ShouldQueue
{
    use Queueable, Notifiable;

    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->view('emails.notifications.create', ['notification' => $this->message])
            ->subject('New Notification: ' . $this->message->message); // Assuming $this->message has a 'message' attribute
    }
}
