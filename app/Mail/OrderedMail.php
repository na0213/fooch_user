<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $item;
    public $user;
    public $shipping_address;

    public function __construct($item, $user, $shipping_address)
    {
        $this->item = $item;
        $this->user = $user;
        $this->shipping_address = $shipping_address;
    }

    public function build()
    {
        return $this->view('emails.ordered')->subject('商品が注文されました。');
    }
}
