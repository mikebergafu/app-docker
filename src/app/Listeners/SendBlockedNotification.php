<?php

namespace App\Listeners;

use App\Events\Blocked;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendBlockedNotification
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
     * @param  Blocked  $event
     * @return void
     */
    public function handle(Blocked $event)
    {
        //
    }
}
