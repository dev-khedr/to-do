<?php

namespace App\Http\Authentication\Channels;

use Raid\Core\Authentication\Channels\Channel;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Workers\EmailWorker;

class SystemChannel extends Channel implements ChannelInterface
{
    public const NAME = 'system';
}
