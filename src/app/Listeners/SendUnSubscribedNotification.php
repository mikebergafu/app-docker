<?php

namespace App\Listeners;

use App\Events\UnSubscribed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUnSubscribedNotification
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
     * @param  UnSubscribed  $event
     * @return void
     */
    public function handle(UnSubscribed $event)
    {
        //
    }
}
