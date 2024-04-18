<?php

namespace App\Http\Authentication\Steps;

use App\Core\Integrations\Mail\MailService;
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
        $this->mailService->send(
            $channel->getAuthenticatable('email'),
            new TwoFactorMail($channel->getAuthenticatable('name')),
        );
    }
}
