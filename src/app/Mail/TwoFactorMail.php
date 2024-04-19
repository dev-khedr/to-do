<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TwoFactorMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly string $name,
        private readonly int $code,
    ) {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Two Factor Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.two-factor-code',
            with: $this->getContent(),
        );
    }

    private function getContent(): array
    {
        return [
            'name' => $this->name,
            'code' => $this->code,
        ];
    }
}
