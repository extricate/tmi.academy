<?php

namespace App\Listeners;

use App\Contact;
use App\Events\NewQuote;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateNewContactFromQuote
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
        // the quote does not yet have a contact associated with it, so let's create that now
        $contact = new Contact([

        ]);
    }
}
