<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class SendEmailTest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $my_data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($my_data)
    {
        $this->my_data = $my_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new \App\Mail\SendEmailTest($this->my_data);
        Redis::throttle('New Job')->allow(1)->every(10)
            ->then(function () use ($email) {
                Mail::to('mikebergafu@yahoo.com')->send($email);
            }, function () {
                return $this->release(10);
            });
    }

    protected function transac_data(){
        return 'Mike-berg Afu';
    }
}
