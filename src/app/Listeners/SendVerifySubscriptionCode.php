<?php

namespace App\Listeners;

use App\Events\Subscribed;
use App\Helpers\BergyUtils;
use App\Helpers\NotificationUtils;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendVerifySubscriptionCode
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
     * @param  Subscribed  $event
     * @return void
     */
    public function handle(Subscribed $event)
    {

       $noti = NotificationUtils::send_txt_gh_sms($event->transaction['mobile_no'], $event->transaction['message']);
       //BergyUtils::downloadJSONFile($noti);
    }
}
