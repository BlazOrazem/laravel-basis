<?php

namespace Numencode\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
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

        Event::listen(
            'user.reset_password',
            'Numencode\Listeners\UserEventListener@onPasswordReset'
        );

        Event::listen(
            'user.update_profile',
            'Numencode\Listeners\UserEventListener@onProfileUpdate'
        );

        Event::listen('dictionary.update', function ($group) {
            Artisan::call('lang:export', ['--group' => $group]);
        });
    }
}
