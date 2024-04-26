<?php

namespace App\Http\Authentication\Authenticators;

use Raid\Guardian\Authenticators\Authenticator;
use Raid\Guardian\Authenticators\Contracts\AuthenticatorInterface;

class TestAuthenticator extends Authenticator implements AuthenticatorInterface
{
    public const NAME = '';

    protected string $authenticatable = '';

    protected array $channels = [];
}
