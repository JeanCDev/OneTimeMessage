<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class email_read_confirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $read_time;
    public $receiver_email;

    public function __construct($read_time, $receiver_email)
    {
        $this->read_time = $read_time;
        $this->receiver_email = $receiver_email;
    }

    public function build()
    {
        return $this->subject('Você recebeu uma mensagem que só pode ser lida uma vez')
                ->view('Emails/email_readed');
    }
}
