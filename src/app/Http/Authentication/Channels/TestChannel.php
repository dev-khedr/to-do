<?php

namespace App\Http\Authentication\Channels;

use Raid\Core\Authentication\Channels\Channel;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;

class TestChannel extends Channel implements ChannelInterface
{
    public const NAME = '';
}
