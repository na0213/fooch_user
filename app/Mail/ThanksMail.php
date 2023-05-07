<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ThanksMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $purchasedItems;
    public $shipping_address;

    public function __construct($user, $purchasedItems, $shipping_address)
    {
        $this->user = $user;
        $this->purchasedItems = $purchasedItems;
        $this->shipping_address = $shipping_address;
    }

    public function build()
    {
        return $this->view('emails.thanks')->subject('ご購入ありがとうございます。');
    }
}
