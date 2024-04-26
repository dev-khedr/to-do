<?php

namespace App\Http\Authentication\Rules;

use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Rules\Contracts\RuleInterface;

class TestRule implements RuleInterface
{
    public function handle(ChannelInterface $channel): bool
    {
    }

    public function fail(ChannelInterface $channel): void
    {
    }
}
