<?php

namespace App\Http\Authentication\Steps;

use Raid\Core\Authentication\Steps\Contracts\StepInterface;

class TestStep implements StepInterface
{
    public function handle(ChannelInterface $channel): void
    {
    }
}
