<?php

namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AdsbusinessNotification extends Notification
{
    use Queueable;
    protected $adsbusiness;
    public function __construct($adsbusiness)
    {
        $this->adsbusiness = $adsbusiness;
    }
    public function via($notifiable)
    {
        return ['database']; // Only store the notification in the database
    }
    public function toDatabase($notifiable)
    {
        return [
            'id' => $this->adsbusiness->id, // The ID of the Adsbusiness submission
            'message' => 'Adsmarket for business has Contact for ' . $this->adsbusiness->name, // Custom message
        ];
    }
}