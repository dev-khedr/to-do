<?php

namespace App\Http\Authentication\Sequences;

use App\Core\Integrations\Mail\MailService;
use App\Enums\VerificationType;
use App\Mail\TwoFactorMail;
use Raid\Guardian\Authenticators\Contracts\AuthenticatorInterface;
use Raid\Guardian\Sequences\Contracts\SequenceInterface;
use Raid\Guardian\Traits\Sequences\HasQueue;

class TwoFactorEmailSequence implements SequenceInterface
{
    use HasQueue;

    public function __construct(
        private readonly MailService $mailService,
    ) {}

    public function handle(AuthenticatorInterface $authenticator): void
    {
        $authenticatable = $authenticator->getAuthenticatable();

        $verification = $authenticatable->verification()->create([
            'type' => VerificationType::TWO_FACTOR_EMAIL,
        ]);

        $this->send(
            $authenticatable->getAttribute('email'),
            $authenticatable->getAttribute('name'),
            $verification->getAttribute('code'),
        );
    }

    private function send(string $email, string $name, int $code): void
    {
        $this->mailService->send(
            $email,
            new TwoFactorMail($name, $code),
        );
    }
}
