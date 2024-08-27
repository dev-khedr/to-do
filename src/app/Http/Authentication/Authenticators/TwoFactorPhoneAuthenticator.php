<?php

namespace App\Http\Authentication\Authenticators;

use App\Http\Authentication\Norms\MatchingPasswordNorm;
use App\Http\Authentication\Norms\VerifiedNorm;
use App\Http\Authentication\Sequences\TwoFactorPhoneSequence;
use App\Http\Authentication\Matchers\PhoneMatcher;
use Raid\Guardian\Authenticators\Authenticator;
use Raid\Guardian\Authenticators\Contracts\AuthenticatorInterface;
use Raid\Guardian\Authenticators\Contracts\ShouldRunNorms;
use Raid\Guardian\Authenticators\Contracts\ShouldRunSequences;
use Raid\Guardian\Channels\Channel;
use Raid\Guardian\Channels\Contracts\ChannelInterface;
use Raid\Guardian\Channels\Contracts\ShouldRunRules;
use Raid\Guardian\Channels\Contracts\ShouldRunSteps;

class TwoFactorPhoneAuthenticator extends Authenticator implements AuthenticatorInterface, ShouldRunNorms, ShouldRunSequences
{
    public const NAME = 'two-factor-phone';

    protected array $matchers = [
        PhoneMatcher::class,
    ];

    protected array $norms = [
        MatchingPasswordNorm::class,
        VerifiedNorm::class,
    ];

    protected array $sequences = [
        TwoFactorPhoneSequence::class,
    ];
}
