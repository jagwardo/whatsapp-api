<?php

namespace App\Events;

class MessageEvent extends Event
{
    public $message;
    public function __construct(QueuedMessage $message)
    {
        $this->message = $message;
    }
    
    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle($event)
    {
        Log::info('WA Message sent from lumen app:' . json_encode($event));
    }
}
