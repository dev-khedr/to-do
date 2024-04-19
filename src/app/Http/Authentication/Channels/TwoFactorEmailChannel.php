<?php

namespace App\Http\Authentication\Channels;

use Raid\Core\Authentication\Channels\Channel;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Channels\Contracts\Concerns\ShouldRunRules;
use Raid\Core\Authentication\Channels\Contracts\Concerns\ShouldRunSteps;
use Raid\Core\Authentication\Traits\Channels\HasRules;
use Raid\Core\Authentication\Traits\Channels\HasSteps;

class TwoFactorEmailChannel extends Channel implements ChannelInterface, ShouldRunRules, ShouldRunSteps
{
    use HasRules;
    use HasSteps;

    public const NAME = 'two-factor-email';
}
