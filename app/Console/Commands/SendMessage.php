<?php

namespace App\Console\Commands;
use App\Order;
use Illuminate\Console\Command;
class SendMessage extends Command
{
    protected $signature = 'wamessage:send';
    
    protected $description = 'Send a whatsapp message to a contact number';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function handle()
    {
        $message = WAMessage::with('wamessage')->inRandomOrder()->first();
        event(new \App\Events\MessageEvent($message));
        return 0;
    }
}
