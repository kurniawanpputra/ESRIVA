<?php

namespace App\Notifications;

use App\Feedback;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FeedbackDone extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @var Feedback
     */
    public $feedback;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Umpan Balik Selesai - ESRIVA')
                    ->line('Hai, '.$this->feedback->user->name.'!'.' Umpan balik yang kamu buat sudah dibaca dan sudah diproses oleh admin.')
                    ->line('Terima kasih telah menggunakan aplikasi kami :)');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
