<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class addToCartNotification extends Notification
{
    use Queueable;
    public $name;
    /**
     * Create a new notification instance.
     */
    public function __construct($name)
    {
        //
        $this->name=$name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via( $notifiable): array
    {
        return ['database'];
    }

    public function toArray( $notifiable): array
    {
        return [
            'name'=>$this->name
        ];
    }
}
