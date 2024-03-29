<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class DadosPessoas extends Notification
{
    use Queueable;

    private $details;
   
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }
   
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }
   
    public function toDatabase($notifiable)
    {
        return [
            'user_id' => $this->details['user_id'],
            'class' => 'bg-success',
            'icon' => 'fa-calendar-check',
            'mensagem' => 'notification.data_person',
        ];
    }
}
