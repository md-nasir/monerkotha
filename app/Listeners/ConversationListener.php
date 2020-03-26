<?php

namespace App\Listeners;

use App\Events\ConversationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConversationListener
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
     * @param  ConversationEvent  $event
     * @return void
     */
    public function handle(ConversationEvent $event)
    {
        //
    }
}
