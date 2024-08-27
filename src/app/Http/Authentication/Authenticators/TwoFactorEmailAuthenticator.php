<?php

namespace App\Http\Authentication\Authenticators;

use App\Http\Authentication\Norms\MatchingPasswordNorm;
use App\Http\Authentication\Norms\VerifiedNorm;
use App\Http\Authentication\Sequences\TwoFactorEmailSequence;
use App\Http\Authentication\Matchers\EmailMatcher;
use Raid\Guardian\Authenticators\Authenticator;
use Raid\Guardian\Authenticators\Contracts\AuthenticatorInterface;
use Raid\Guardian\Authenticators\Contracts\ShouldRunNorms;
use Raid\Guardian\Authenticators\Contracts\ShouldRunSequences;

class TwoFactorEmailAuthenticator extends Authenticator implements AuthenticatorInterface, ShouldRunNorms, ShouldRunSequences
{
    public const NAME = 'two-factor-email';

    protected array $matchers = [
        EmailMatcher::class,
    ];

    protected array $norms = [
        MatchingPasswordNorm::class,
        VerifiedNorm::class,
    ];

    protected array $sequences = [
        TwoFactorEmailSequence::class,
    ];
}
