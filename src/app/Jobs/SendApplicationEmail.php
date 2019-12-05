<?php

namespace App\Jobs;

use App\Mail\ApplicationEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class SendApplicationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $posted_job_details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($posted_job_details)
    {
        $this->posted_job_details = $posted_job_details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emails = [$this->posted_job_details['poster_email'], $this->posted_job_details['applicant_email']];
        //BergyUtils::downloadJSONFile($this->posted_job);
        $email = new ApplicationEmail($this->posted_job_details);

        Redis::throttle('Send Application Email')
            ->allow(1)
            ->every(10)
            ->then(function () use ($email, $emails) {
                Mail::to($this->posted_job_details['applicant_email'])
                    ->send($email);
            }, function () {
                return $this->release(10);
            });
    }
}
