<?php

namespace App\Http\Authentication\Steps;

use App\Core\Integrations\Mail\MailService;
use App\Enums\VerificationType;
use App\Mail\TwoFactorMail;
use Illuminate\Foundation\Bus\PendingDispatch;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Steps\Contracts\ShouldRunQueue;
use Raid\Core\Authentication\Steps\Contracts\StepInterface;
use Raid\Core\Authentication\Traits\Steps\HasQueue;

class TwoFactorEmailStep implements StepInterface, ShouldRunQueue
{
    use HasQueue;

    public function __construct(
        private readonly MailService $mailService,
    ) {

    }

    public function handle(ChannelInterface $channel): void
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
        $this->mailService->send(
            $email,
            new TwoFactorMail($name, $code),
        );
    }
}
