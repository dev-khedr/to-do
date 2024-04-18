<?php

namespace App\Http\Authentication\Steps;

use App\Core\Integrations\Mail\MailService;
use App\Core\Integrations\Sms\SmsService;
use App\Enums\VerificationType;
use App\Mail\TwoFactorMail;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Steps\Contracts\StepInterface;

readonly class TwoFactorPhoneStep implements StepInterface
{
    public function __construct(
        private SmsService $smsService,
    ) {

    }

    public function run(ChannelInterface $channel): void
    {
        $authenticatable = $channel->getAuthenticatable();

        $verification = $authenticatable->verification()->create([
            'type' => VerificationType::TWO_FACTOR_PHONE,
        ]);

        $this->send(
            $authenticatable->getAttribute('phone'),
            $verification->getSmsMessage(),
        );
    }

    private function send(string $phone, string $message): void
    {
        $this->smsService->send($phone, $message);
    }
}
