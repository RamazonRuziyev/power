<?php

namespace App\Notifications;

use App\Models\Petition;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PetitionCreatedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $petition;
    public function __construct( $petition)
    {
        $this->petition = $petition;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'fio' => $this->petition->fio,
            'mfy' => $this->petition->mfy,
            'village' => $this->petition->village,
            'phone' => $this->petition->phone,
            'description' => $this->petition->description,
            'employee' => $this->petition->employee,
        ];
    }
}
