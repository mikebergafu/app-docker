<?php

namespace App\Jobs;

use App\Helpers\BergyUtils;
use App\Job;
use App\Mail\NewJobPostAlert;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class SendJobPostingAlert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $job_posted;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Job $job_posted)
    {
        $this->job_posted  = $job_posted;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $email = new NewJobPostAlert( $this->job_posted);

        Redis::throttle('New Job')->allow(1)->every(10)
            ->then(function () use ($email) {
                Mail::to('mikebergafu@gmail.com')->send($email);
            }, function () {
                return $this->release(10);
            });
    }
}
