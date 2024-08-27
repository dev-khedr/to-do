<?php

namespace App\Http\Authentication\Norms;

use Illuminate\Support\Facades\Hash;
use Raid\Guardian\Authenticators\Contracts\AuthenticatorInterface;
use Raid\Guardian\Channels\Contracts\ChannelInterface;
use Raid\Guardian\Norms\Contracts\NormInterface;
use Raid\Guardian\Rules\Contracts\RuleInterface;

class MatchingPasswordNorm implements NormInterface
{
    public function handle(AuthenticatorInterface $authenticator): bool
    {
        return Hash::check(
            $authenticator->getCredentials('password'),
            $authenticator->getAuthenticatable()->getAuthPassword(),
        );
    }

    public function fail(AuthenticatorInterface $authenticator): void
    {
        $authenticator->fail(message: __('auth.failed'));
    }
}
