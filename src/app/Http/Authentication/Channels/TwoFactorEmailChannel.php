<?php

namespace App\Http\Authentication\Channels;

use App\Http\Authentication\Rules\MatchingPasswordRule;
use App\Http\Authentication\Rules\VerifiedRule;
use App\Http\Authentication\Steps\TwoFactorEmailStep;
use Raid\Guardian\Channels\Channel;
use Raid\Guardian\Channels\Contracts\ChannelInterface;
use Raid\Guardian\Channels\Contracts\ShouldRunRules;
use Raid\Guardian\Channels\Contracts\ShouldRunSteps;
use Raid\Guardian\Workers\EmailWorker;

class TwoFactorEmailChannel extends Channel implements ChannelInterface, ShouldRunRules, ShouldRunSteps
{
    public const NAME = 'two-factor-email';

    protected array $workers = [
        EmailWorker::class,
    ];

    protected array $rules = [
        MatchingPasswordRule::class,
        VerifiedRule::class,
    ];

    protected array $steps = [
        TwoFactorEmailStep::class,
    ];
}
