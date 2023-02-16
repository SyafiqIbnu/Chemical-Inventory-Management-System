<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;
use App\Mail\PermitKhasMail;
use App\Role;
use App\User;
use App\MailMessage;
use App\Jobs\SendEmailQueueJob;

class SendMailMessage {

    public static function mailMessage($email, $finds, $replaces, $mail_subject, $mail_text) {
        $modelMessage = collect(['email', 'mail_subject', 'mail_text']);
        for ($i = 0; $i < count($finds); $i++) {
            $mail_subject = str_replace($finds[$i], $replaces[$i], $mail_subject);
            $mail_text = str_replace($finds[$i], $replaces[$i], $mail_text);
        }
        $modelMessage->email = $email;
        $modelMessage->mail_subject = $mail_subject;
        $modelMessage->mail_text = $mail_text;
        //Mail::to($modelMessage->email)->send(new PermitKhasMail($modelMessage));
        SendEmailQueueJob::dispatch($modelMessage->email,$modelMessage,new PermitKhasMail($modelMessage));
    }
    
}
