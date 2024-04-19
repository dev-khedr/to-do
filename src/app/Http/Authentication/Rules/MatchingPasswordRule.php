<?php

namespace App\Http\Authentication\Rules;

use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Rules\Contracts\RuleInterface;

class MatchingPasswordRule implements RuleInterface
{
    public function handle(ChannelInterface $channel): bool
    {
        return true;
    }
}
