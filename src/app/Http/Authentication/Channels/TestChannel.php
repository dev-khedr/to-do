<?php

namespace App\Http\Authentication\Channels;

use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Channels\Channel;

class TestChannel extends Channel implements ChannelInterface
{
    public const NAME = '';
}