<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplicationEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $job_details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job_details)
    {
        $this->job_details=$job_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.subscribe.completed')->subject($this->job_details['subject'])
            ->with(['data'=>$this->job_details]);
    }
}
