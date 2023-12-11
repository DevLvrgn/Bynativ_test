<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sujet;
    public $contenu;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sujet, $contenu)
    {
        $this->sujet = $sujet;
        $this->contenu = $contenu;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('hugo@bynativ.com', 'Hugo Lavergne')
            ->subject($this->sujet)
            ->view('emails.booking-confirmation');
    }
}
