<?php

namespace App\Http\Authentication\Channels;

use App\Http\Authentication\Rules\VerifiedRule;
use App\Http\Authentication\Steps\TwoFactorEmailStep;
use Raid\Core\Authentication\Channels\Channel;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Channels\Contracts\Concerns\ShouldRunRules;
use Raid\Core\Authentication\Channels\Contracts\Concerns\ShouldRunSteps;
use Raid\Core\Authentication\Rules\MatchingPasswordRule;
use Raid\Core\Authentication\Workers\EmailWorker;

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
