<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendEmailTest extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction_data;

    /**
     * Create a new message instance.
     *
     * @param $transaction_data
     */
    public function __construct($transaction_data)
    {
        $this->transaction_data = $transaction_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       /* Log::info("Request Cycle with Queues Begins");
        return $this->view('emails.test')->with(['data'=>'hello']);*/

        return $this->view('emails.test')
            ->with(
                [
                    'data' => $this->transaction_data,
                    'testVarTwo' => '2'
                ]);

    }
}
