<?php

namespace App\Http\Authentication\Norms;

use Raid\Guardian\Authenticators\Contracts\AuthenticatorInterface;
use Raid\Guardian\Norms\Contracts\NormInterface;

class VerifiedNorm implements NormInterface
{
    public function handle(AuthenticatorInterface $authenticator): bool
    {
        return $authenticator->getAuthenticatable()->isVerified();
    }

    public function fail(AuthenticatorInterface $authenticator): void
    {
        $authenticator->fail(message: __('auth.unverified'));
    }
}
