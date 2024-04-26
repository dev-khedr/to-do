<?php

namespace App\Http\Authentication\Rules;

use Raid\Guardian\Channels\Contracts\ChannelInterface;
use Raid\Guardian\Rules\Contracts\RuleInterface;

class VerifiedRule implements RuleInterface
{
    public function handle(ChannelInterface $channel): bool
    {
        return $channel->getAuthenticatable()->isVerified();
    }

    public function fail(ChannelInterface $channel): void
    {
        $channel->fail(message: __('auth.unverified'));
    }
}
