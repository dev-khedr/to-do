<?php

namespace App\Http\Authentication\Steps;

use App\Core\Integrations\Sms\SmsService;
use App\Enums\VerificationType;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Steps\Contracts\ShouldQueueStep;
use Raid\Core\Authentication\Steps\Contracts\StepInterface;
use Raid\Core\Authentication\Traits\Steps\HasQueue;

class TwoFactorPhoneStep implements StepInterface, ShouldQueueStep
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
