<?php

namespace App\Providers;

use App\Messages\WhatsAppGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WhatsAppGateway::class, function ($app){
            return new WhatsAppGateway();
        });
    }
    
}
