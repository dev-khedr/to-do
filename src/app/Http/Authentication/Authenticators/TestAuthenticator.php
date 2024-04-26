<?php

namespace App\Http\Authentication\Authenticators;

use Raid\Core\Authentication\Authenticators\Authenticator;
use Raid\Core\Authentication\Authenticators\Contracts\AuthenticatorInterface;

class TestAuthenticator extends Authenticator implements AuthenticatorInterface
{
    public const NAME = '';

    protected string $authenticatable = '';

    protected array $channels = [];
}
