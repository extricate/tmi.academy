<?php

namespace App\Listeners;

use App\Events\NewQuote;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendQuoteEmails
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewQuote  $event
     * @return void
     */
    public function handle(NewQuote $event)
    {
        //
    }
}
