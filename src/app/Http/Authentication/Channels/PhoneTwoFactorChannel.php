<?php

namespace App\Http\Authentication\Channels;

use Raid\Core\Authentication\Channels\Channel;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Workers\EmailWorker;

class PhoneTwoFactorChannel extends Channel implements ChannelInterface
{
    public const NAME = 'phone-2fa';
}
