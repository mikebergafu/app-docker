<?php

namespace App\Jobs;

use App\Mail\NotificationSignUpEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class SendNotificationSignUpEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $subscribe_details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subscribe_details)
    {
        $this->subscribe_details=$subscribe_details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new NotificationSignUpEmail($this->subscribe_details);
        Redis::throttle('New Notification Subscription')->allow(1)->every(10)
            ->then(function () use ($email) {
                Mail::to($this->subscribe_details['email'])->send($email);
            }, function () {
                return $this->release(10);
            });
    }
}
