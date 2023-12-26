<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventPaymentConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    public $array;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($array)
     {
         $this->array = $array;
     }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Event Withdraw Confirmation Mail',
        );
    }

    public function build()
    {
        return $this->from('do-not-reply@gogiving.co.uk', 'Gogiving')
                    ->subject($this->array['subject'])
                    ->markdown('emails.eventwithdrawconfirm');
    }
}
