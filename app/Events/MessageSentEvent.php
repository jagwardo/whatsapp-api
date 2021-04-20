<?php

namespace App\Listeners;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;
class MessageSentEvent implements ShouldQueue
{
    public $connection = 'rabbitmq_direct';

    public function __construct()
    {
       
        $randomNumber = rand(0, 1);
        $queueKeys = [];
        $routingKeys = [];

        config([ 'queue.connections.rabbitmq_direct.queue' => $queueKeys[$randomNumber],
        'queue.connections.rabbitmq_direct.options.queue.exchange_routing_key' => $routingKeys[$randomNumber]
        ]);

    }
    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle($event)
    {
        Log::info('WA Message Status updated, notification sent to microservices:' . json_encode($event));
    }
}
