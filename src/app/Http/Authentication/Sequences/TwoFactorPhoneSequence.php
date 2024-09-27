<?php

namespace App\Http\Authentication\Sequences;

use App\Core\Integrations\Sms\SmsService;
use App\Enums\VerificationType;
use Raid\Guardian\Authenticators\Contracts\AuthenticatorInterface;
use Raid\Guardian\Sequences\Contracts\QueueSequenceInterface;
use Raid\Guardian\Traits\Sequences\HasQueue;

class TwoFactorPhoneSequence implements QueueSequenceInterface
{
    use HasQueue;

    public function __construct(
        private readonly SmsService $smsService,
    ) {}

    public function handle(AuthenticatorInterface $authenticator): void
    {
        $authenticatable = $authenticator->getAuthenticatable();

        $verification = $authenticatable->verification()->create([
            'type' => VerificationType::TWO_FACTOR_PHONE,
        ]);

        $this->send(
            $authenticatable->getAttribute('phone'),
            $verification->getPhoneMessage(),
        );
    }

    private function send(string $phone, string $message): void
    {
        $this->smsService->send(
            $phone,
            $message,
        );
    }
}
