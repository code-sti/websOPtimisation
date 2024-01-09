<?php

namespace App\Jobs;

use App\Models\Notification as NotificationModel;
use App\Notifications\CustomNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification as BaseNotification;
use Illuminate\Queue\SerializesModels;

class ProcessNotification implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $notification;

    public function __construct(NotificationModel $notification)
    {
        $this->notification = $notification;
    }

    public function handle()
    {
        $this->notification->users()->chunk(100, function ($users) {
            foreach ($users as $user) {
                $user->notify(new CustomNotification($this->notification));
            }
        });
    }
}
