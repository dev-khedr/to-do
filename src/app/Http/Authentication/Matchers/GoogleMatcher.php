<?php

namespace App\Http\Authentication\Matchers;

use Illuminate\Support\Facades\Http;
use Raid\Guardian\Authenticatable\Contracts\AuthenticatableInterface;
use Raid\Guardian\Matchers\Contracts\MatcherInterface;
use Raid\Guardian\Matchers\Matcher;
use Throwable;

class GoogleMatcher extends Matcher implements MatcherInterface
{
    public const ATTRIBUTE = 'idToken';

    public function find(AuthenticatableInterface $authenticatable, array $credentials): ?AuthenticatableInterface
    {
        $email = $this->getUserEmail($this->getMatcherValue($credentials));

        return $authenticatable->findForAuthentication('email', $email)
            ?? $authenticatable->create([
                'email' => $email,
            ]);
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
}
