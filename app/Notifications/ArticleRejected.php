<?php

namespace App\Notifications;

use App\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ArticleRejected extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @var Article
     */
    public $article;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
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
                    ->subject('Penolakan Artikel - ESRIVA')
                    ->line('Maaf, '.$this->article->user->name.'.'.' Artikel kamu yang berjudul "'.$this->article->title.'" ditolak oleh admin karena dianggap belum memenuhi kriteria.')
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
