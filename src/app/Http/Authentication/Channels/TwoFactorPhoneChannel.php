<?php

namespace App\Http\Authentication\Channels;

use App\Http\Authentication\Rules\MatchingPasswordRule;
use App\Http\Authentication\Rules\VerifiedRule;
use App\Http\Authentication\Steps\TwoFactorPhoneStep;
use App\Http\Authentication\Workers\PhoneWorker;
use Raid\Guardian\Channels\Channel;
use Raid\Guardian\Channels\Contracts\ChannelInterface;
use Raid\Guardian\Channels\Contracts\ShouldRunRules;
use Raid\Guardian\Channels\Contracts\ShouldRunSteps;

class TwoFactorPhoneChannel extends Channel implements ChannelInterface, ShouldRunRules, ShouldRunSteps
{
    public const NAME = 'two-factor-phone';

    protected array $workers = [
        PhoneWorker::class,
    ];

    protected array $rules = [
        MatchingPasswordRule::class,
        VerifiedRule::class,
    ];

    protected array $steps = [
        TwoFactorPhoneStep::class,
    ];
}
