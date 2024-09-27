<?php

namespace App\Http\Authentication\Authenticators;

use App\Http\Authentication\Matchers\EmailMatcher;
use App\Http\Authentication\Matchers\PhoneMatcher;
use App\Http\Authentication\Norms\MatchingPasswordNorm;
use App\Http\Authentication\Norms\VerifiedNorm;
use Raid\Guardian\Authenticators\Authenticator;
use Raid\Guardian\Authenticators\Contracts\AuthenticatorInterface;
use Raid\Guardian\Authenticators\Contracts\ShouldRunNorms;

class SystemAuthenticator extends Authenticator implements AuthenticatorInterface, ShouldRunNorms
{
    public const NAME = 'system';

    protected array $matchers = [
        EmailMatcher::class,
        PhoneMatcher::class,
    ];

    protected array $norms = [
        MatchingPasswordNorm::class,
        VerifiedNorm::class,
    ];
}
