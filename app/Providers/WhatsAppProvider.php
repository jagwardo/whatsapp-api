<?php

namespace App\Providers;

use App\Http\Requests\Request;
use Laravel\Lumen\Http\Redirector;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Validation\ValidatesWhenResolved;

class WhatsAppAPIProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->afterResolving(ValidatesWhenResolved::class, function ($resolved) {
            $resolved->validate();
        });
        $this->app->resolving(FormRequest::class, function ($request, $app) {
            $this->initializeRequest($request, $app['request']);
            $request->setContainer($app)->setRedirector($app->make(Redirector::class));
        });
    }

    /**
     * Initialize the form request with data from the given request.
     *
     * @param  FormRequest $form
     * @param  \Symfony\Component\HttpFoundation\Request  $current
     * @return void
     */
    protected function callWhatsAppAPI(/** params */)
    {
        /**
         * Implement and handle an http call to whatsapp business API
         */
    }


}
