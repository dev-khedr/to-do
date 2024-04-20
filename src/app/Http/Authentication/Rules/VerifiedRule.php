<?php

namespace App\Http\Authentication\Rules;

use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Rules\Contracts\RuleInterface;

class VerifiedRule implements RuleInterface
{
    public function handle(ChannelInterface $channel): bool
    {
        $valid = $channel->getAuthenticatable()->isVerified();

        if (! $valid) {
            $channel->fail(message: __('auth.unverified'));
        }

        return $valid;
    }
}
