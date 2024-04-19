<?php

namespace App\Http\Authentication\Channels;

use App\Http\Authentication\Rules\VerifiedRule;
use Raid\Core\Authentication\Channels\Channel;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Channels\Contracts\Concerns\ShouldRunRules;
use Raid\Core\Authentication\Traits\Channels\HasRules;
use Raid\Core\Authentication\Workers\EmailWorker;

class SystemChannel extends Channel implements ChannelInterface, ShouldRunRules
{
    use HasRules;

    public const NAME = 'system';

    protected array $rules = [
        VerifiedRule::class,
    ];

    protected array $workers = [
        EmailWorker::class,
    ];
}
