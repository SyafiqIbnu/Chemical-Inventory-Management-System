<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class PermitKhasMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_text;
    public $mail_subject; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg)
    {
        $this->mail_text = $msg->mail_text; 
        $this->mail_subject = $msg->mail_subject; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail_text = $this->mail_text;
        return $this->markdown('mail.show', compact('mail_text'))->subject($this->mail_subject);
    }
}
