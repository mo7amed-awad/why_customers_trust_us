<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMessageSummary extends Mailable
{
    use Queueable, SerializesModels;

    public $Message;

    public $Client;

    public function __construct($data)
    {
        $this->Message = $data['Message'];
        $this->Client = $data['Client'];
    }

    public function build()
    {
        return $this->view('emails.NewMessage');
    }
}
