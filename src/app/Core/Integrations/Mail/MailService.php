<?php

namespace App\Core\Integrations\Mail;

use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function send(mixed $users, Mailable $mailable): void
    {
        Mail::to($users)->send($mailable);
    }
}
