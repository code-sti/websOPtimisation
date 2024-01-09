<?php

namespace App\Mail; // Adjust namespace if needed

use App\Models\NotificationModel; // Adjust model name if needed
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public NotificationModel $notification;

    public function __construct(NotificationModel $notification)
    {
        $this->notification = $notification;
    }

    public function build()
    {
        return $this->markdown('emails.notifications.create')
            ->subject('New Notification: ' . $this->notification->message);
    }
}
