<?php

namespace App\Listeners;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class MessageListener
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
     * @param  \App\Events\MessageEvent  $event
     * @return void
     */
    public function handle(MessageEvent $event)
    {
        Log::info('WhatsApp Message Sent:' . json_encode($event));
    }
}
