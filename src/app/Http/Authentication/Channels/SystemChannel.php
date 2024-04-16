<?php

namespace App\Http\Authentication\Channels;

use App\Http\Authentication\Workers\EmailWorker;
use Raid\Core\Authentication\Channels\Channel;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;

class SystemChannel extends Channel implements ChannelInterface
{
    public const NAME = 'system';

    protected array $workers = [
        EmailWorker::class,
    ];
}
