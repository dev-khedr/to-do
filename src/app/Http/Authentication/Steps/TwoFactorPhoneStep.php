<?php

namespace App\Http\Authentication\Steps;

use App\Core\Integrations\Sms\SmsService;
use App\Enums\VerificationType;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Steps\Contracts\QueueStepInterface;
use Raid\Core\Authentication\Steps\QueueStep;

class TwoFactorPhoneStep extends QueueStep implements QueueStepInterface
{
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
        $this->smsService->send($phone, $message);
    }
}
