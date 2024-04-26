<?php

namespace App\Http\Authentication\Channels;

use App\Http\Authentication\Rules\MatchingPasswordRule;
use App\Http\Authentication\Rules\VerifiedRule;
use App\Http\Authentication\Workers\PhoneWorker;
use Raid\Guardian\Channels\Channel;
use Raid\Guardian\Channels\Contracts\ChannelInterface;
use Raid\Guardian\Channels\Contracts\ShouldRunRules;
use Raid\Guardian\Workers\EmailWorker;

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
