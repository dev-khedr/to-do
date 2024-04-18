<?php

namespace App\Http\Authentication\Steps;

use App\Core\Integrations\Mail\MailService;
use App\Enums\VerificationType;
use App\Mail\TwoFactorMail;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Steps\Contracts\StepInterface;

readonly class TwoFactorEmailStep implements StepInterface
{
    public function __construct(
        private MailService $mailService,
    ) {

    }

    public function run(ChannelInterface $channel): void
    {
        $authenticatable = $channel->getAuthenticatable();

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
        $this->mailService->send($email, new TwoFactorMail($name, $code));
    }
}
