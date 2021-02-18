<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class email_read_message extends Mailable
{
    use Queueable, SerializesModels;

    public $purl;

    public function __construct($purl)
    {
        $this->purl = $purl;
    }

    public function build()
    {
        return $this->subject('Sua mensagem foi lida')
                ->view('Emails/email_read');
    }
}
