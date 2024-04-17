<?php

namespace App\Http\Authentication\Steps;

use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Steps\Contracts\StepInterface;

class PhoneTwoFactorStep implements StepInterface
{
    public function run(ChannelInterface $channel): void
    {

    }
}
