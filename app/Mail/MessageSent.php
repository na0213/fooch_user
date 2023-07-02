<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;

class MessageSent extends Mailable
{
    use Queueable, SerializesModels;

    public $mailContent;

    public function __construct($mailContent)
    {
        $this->mailContent = $mailContent;
    }

    public function envelope(): Envelope
    {
        return (new Envelope)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject('メッセージが届いています');
    }

    public function content(): Content
    {
        return (new Content)
            ->view('emails.message', ['mailContent' => $this->mailContent]);
    }

    public function attachments(): array
    {
        return [];
    }
}


