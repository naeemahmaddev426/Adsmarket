<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdUpdatedOrCreated extends Notification
{
    use Queueable;

    public $ad; // The ad model

    /**
     * Create a new notification instance.
     */
    public function __construct($ad)
    {
        $this->ad = $ad;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['database']; // Store the notification in the database
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable)
    {
        return [
            'ad_id' => $this->ad->id,
            'message' => 'Your ad is live ' . ($this->ad->wasRecentlyCreated ? 'created' : 'updated'),
        ];
    }
}
