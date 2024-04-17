<?php

namespace App\Http\Authentication\Rules;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Rules\Contracts\RuleInterface;

class MatchingPasswordRule implements RuleInterface
{
    public function run(ChannelInterface $channel): bool
    {
        $valid = Hash::check(
            $channel->getCredentials('password', ''),
            $channel->getAuthenticatable()->getAuthPassword()
        );

        if (! $valid) {
            $channel->errors()->add('error', __('auth.failed'));
        }

        return $valid;
    }
}
