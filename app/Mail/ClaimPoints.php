<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClaimPoints extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $rek, $amount;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $rek, $amount)
    {
        $this->name = $name;
        $this->rek = $rek;
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name');
    }
}
