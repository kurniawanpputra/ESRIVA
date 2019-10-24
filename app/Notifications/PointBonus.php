<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PointBonus extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @var User
     */
    public $user, $point;

    public function __construct(User $user, $point)
    {
        $this->user = $user;
        $this->point = $point;
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
                ->subject('Bonus Poin - ESRIVA')
                ->line('Hai, '.$this->user->name.'!'.' Kamu mendapat '.$this->point.' poin bonus dari Admin. Ayo login dan cek poinmu sekarang!')
                ->action('Login ESRIVA', route('login'))
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
        return [];
    }
}
