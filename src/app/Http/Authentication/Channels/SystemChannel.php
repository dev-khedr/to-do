<?php

namespace App\Http\Authentication\Channels;

use App\Http\Authentication\Rules\MatchingPasswordRule;
use App\Http\Authentication\Rules\VerifiedRule;
use App\Http\Authentication\Workers\PhoneWorker;
use Raid\Core\Authentication\Channels\Channel;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Channels\Contracts\Concerns\ShouldRunRules;
use Raid\Core\Authentication\Workers\EmailWorker;

class SystemChannel extends Channel implements ChannelInterface, ShouldRunRules
{
    public const NAME = 'system';

    protected array $workers = [
        EmailWorker::class,
        PhoneWorker::class,
    ];

    protected array $rules = [
        MatchingPasswordRule::class,
        VerifiedRule::class,
    ];
}
