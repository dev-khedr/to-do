<?php

namespace App\Http\Authentication\Channels;

use Raid\Core\Authentication\Channels\Channel;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Channels\Contracts\Concerns\ShouldRunRules;
use Raid\Core\Authentication\Traits\Channels\HasRules;

class SystemChannel extends Channel implements ChannelInterface, ShouldRunRules
{
    use HasRules;

    public const NAME = 'system';
}
