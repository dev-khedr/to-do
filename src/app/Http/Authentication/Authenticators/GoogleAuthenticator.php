<?php

namespace App\Http\Authentication\Authenticators;

use App\Http\Authentication\Matchers\GoogleMatcher;
use Raid\Guardian\Authenticators\Authenticator;
use Raid\Guardian\Authenticators\Contracts\AuthenticatorInterface;
use Raid\Guardian\Authenticators\Contracts\ShouldRunNorms;

class GoogleAuthenticator extends Authenticator implements AuthenticatorInterface, ShouldRunNorms
{
    public const NAME = 'google';

    protected array $matchers = [
        GoogleMatcher::class,
    ];

    protected array $norms = [];
}
