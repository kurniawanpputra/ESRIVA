<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClaimPoints extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $rekening, $amount, $bank, $phone;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $rekening, $amount, $bank, $phone)
    {
        $this->name = $name;
        $this->rekening = $rekening;
        $this->amount = $amount;
        $this->bank = $bank;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Klaim Poin Psikolog - ESRIVA')
                    ->view('admin.mails.ClaimPoints');
    }
}