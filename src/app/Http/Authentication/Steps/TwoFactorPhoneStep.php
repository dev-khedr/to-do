<?php

namespace App\Http\Authentication\Steps;

use App\Core\Integrations\Sms\SmsService;
use App\Enums\VerificationType;
use Raid\Guardian\Channels\Contracts\ChannelInterface;
use Raid\Guardian\Steps\Contracts\ShouldRunQueue;
use Raid\Guardian\Steps\Contracts\StepInterface;
use Raid\Guardian\Traits\Steps\HasQueue;

class TwoFactorPhoneStep implements ShouldRunQueue, StepInterface
{
    use HasQueue;

    public function __construct(
        private readonly SmsService $smsService,
    ) {

    }

    public function handle(ChannelInterface $channel): void
    {
        $authenticatable = $channel->getAuthenticatable();

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
