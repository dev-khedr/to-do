<?php

namespace App\Http\Authentication\Channels;

use App\Http\Authentication\Rules\VerifiedRule;
use App\Http\Authentication\Steps\TwoFactorPhoneStep;
use App\Http\Authentication\Workers\PhoneWorker;
use Raid\Core\Authentication\Channels\Channel;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;
use Raid\Core\Authentication\Channels\Contracts\Concerns\ShouldRunRules;
use Raid\Core\Authentication\Channels\Contracts\Concerns\ShouldRunSteps;
use Raid\Core\Authentication\Rules\MatchingPasswordRule;

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
