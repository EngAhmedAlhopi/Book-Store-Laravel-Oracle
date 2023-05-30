<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Session\Session;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $data = [];


    public function __construct($data)
    {
        $this->data = $data;
    }


    public function envelope()
    {
        return new Envelope(
            subject: 'Send Email',
        );
    }


    public function content()
    {
        return new Content(
            view: 'email',
        );
    }


    public function attachments()
    {
        return [];
    }
}