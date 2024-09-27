<?php

namespace App\Http\Authentication\Matchers;

use Illuminate\Support\Facades\Http;
use Raid\Guardian\Authenticatable\Contracts\AuthenticatableInterface;
use Raid\Guardian\Authenticators\Contracts\AuthenticatorInterface;
use Raid\Guardian\Matchers\Contracts\MatcherInterface;
use Raid\Guardian\Matchers\Matcher;
use Throwable;

class GoogleMatcher extends Matcher implements MatcherInterface
{
    public const ATTRIBUTE = 'idToken';

    public function find(AuthenticatableInterface $authenticatable, array $credentials): ?AuthenticatableInterface
    {
        $email = $this->getUserEmail($this->getMatcherValue($credentials));

        return $email ? $this->firstOrCreate($authenticatable, $email) : null;
    }

    private function getUserEmail(string $idToken): ?string
    {
        try {
            return Http::get('https://oauth2.googleapis.com/tokeninfo', [
                'id_token' => $idToken,
            ])->object()->email;
        } catch (Throwable) {
            return null;
        }
    }

    private function firstOrCreate(AuthenticatableInterface $authenticatable, string $email): AuthenticatableInterface
    {
        return $authenticatable->findForAuthentication('email', $email)
            ?? $authenticatable->create([
                'email' => $email,
            ]);
    }

    public function fail(AuthenticatorInterface $authenticator): void
    {
        $authenticator->fail(message: __('Invalid ID token.'));
    }
}
