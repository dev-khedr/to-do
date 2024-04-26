<?php

namespace App\Http\Authentication\Steps;

use Raid\Guardian\Channels\Contracts\ChannelInterface;
use Raid\Guardian\Steps\Contracts\StepInterface;

class TestStep implements StepInterface
{
    public function handle(ChannelInterface $channel): void
    {
    }
}
