<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
       
         'App\Events\ActivationlinkEvent' => [
            'App\Listeners\EmailActivation',
            ],
            'App\Events\VideoUploadedEvent' => [
            'App\Listeners\VideoUploadedListener',
            ],
             'App\Events\RegisterPasswordEvent' => [
            'App\Listeners\ResetPasswordListner',
            ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
