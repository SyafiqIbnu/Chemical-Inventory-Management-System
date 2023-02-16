<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendEmailQueueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    protected $email;
    protected $mailable;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$details,$mailable)
    {
        $this->details=$details;
        $this->email=$email;
        $this->mailable=$mailable;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {             
        Mail::to($this->email)->send($this->mailable);
    }
}
