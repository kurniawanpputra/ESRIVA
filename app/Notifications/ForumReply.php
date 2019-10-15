<?php

namespace App\Notifications;

use App\Forum;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ForumReply extends Notification
{
    use Queueable;

    /**
     * The reply forum.
     * 
     * @var Forum 
     */    
    public $forum;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Forum $forum)
    {
        $this->forum = $forum;
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
                ->subject('Balasan Forum - ESRIVA')
                ->line('Hai, '.$this->forum->user->name.'!'.' Seseorang baru saja menulis komentar di forum kamu.')
                ->action('Buka Forum', route('forum.detail', $this->forum->id))
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