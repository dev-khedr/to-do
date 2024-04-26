<?php

namespace App\Http\Authentication\Rules;

use Raid\Guardian\Channels\Contracts\ChannelInterface;
use Raid\Guardian\Rules\Contracts\RuleInterface;

class TestRule implements RuleInterface
{
    public function handle(ChannelInterface $channel): bool
    {
    }

    public function fail(ChannelInterface $channel): void
    {
    }
}
