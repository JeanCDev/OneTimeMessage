<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class email_confirm_message extends Mailable
{
    use Queueable, SerializesModels;

    public $purl;

    public function __construct($purl)
    {
        $this->purl = $purl;
    }

    public function build()
    {
        return $this->subject('Confirme o envio da mensagem')
                ->view('Emails/email_confirm');
    }
}
