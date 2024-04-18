<?php

namespace App\Http\Authentication\Channels;

use Raid\Core\Authentication\Channels\Channel;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Channels\Contracts\Concerns\RunRules;
use Raid\Core\Authentication\Traits\Channels\HasRules;

class SystemChannel extends Channel implements ChannelInterface, RunRules
{
    use HasRules;

    public const NAME = 'system';
}
