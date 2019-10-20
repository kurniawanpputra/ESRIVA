<?php

namespace App\Notifications;

use App\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ArticleApproved extends Notification
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
                ->subject('Penyetujuan Artikel - ESRIVA')
                ->line('Hai, '.$this->article->user->name.'!'.' Artikel kamu sudah berhasil disetujui oleh admin dan 25 poin berhasil ditambahkan ke akunmu.')
                ->action('Lihat Artikel', route('articles.read', $this->article->slug))
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