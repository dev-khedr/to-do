<?php

namespace App\Http\Authentication\Channels;

use Raid\Guardian\Channels\Channel;
use Raid\Guardian\Channels\Contracts\ChannelInterface;

class TestChannel extends Channel implements ChannelInterface
{
    public const NAME = '';
}
