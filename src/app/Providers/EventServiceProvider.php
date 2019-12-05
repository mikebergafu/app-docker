<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
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

        'App\Events\UserRegistered' => [
            'App\Listeners\SendNotification'
        ],

        'App\Events\Blocked' => [
            'App\Listeners\SendBlockedNotification',
        ],
        'App\Events\Subscribed' => [
            'App\Listeners\SendSubscriptionNotification',
            'App\Listeners\SendVerifySubscriptionCode',
        ],

        'App\Events\UnSubscribed' => [
            'App\Listeners\SendUnSubscribedNotification',
        ],

        'App\Events\WebHook' => [
            'App\Listeners\CheckCallBackReturned',
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
