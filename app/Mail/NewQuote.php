<?php

namespace App\Mail;

use App\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewQuote extends Mailable
{
    use Queueable, SerializesModels;

    public $quote;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Quote $quote)
    {
        $this->quote = $quote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.new-quote')->subject('Nieuwe offerte aangevraagd door ' . $this->quote->contact->name);
    }
}
