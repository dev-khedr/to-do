<?php

namespace App\Core\Services;

use App\Core\Services\Contracts\ServiceInterface;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Raid\Guardian\Authenticatable\Contracts\AuthenticatableInterface;
use Raid\Guardian\Authenticators\Contracts\AuthenticatorInterface;
use Raid\Guardian\Guardians\Contracts\GuardianInterface;
use Raid\Guardian\Tokens\Contracts\TokenInterface;

abstract class AuthenticationService extends Service implements ServiceInterface
{
    protected GuardianInterface $guardian;

    protected function setGuardian(GuardianInterface $guardian): void
    {
        $this->guardian = $guardian;
    }

    public function getGuardian(): GuardianInterface
    {
        return $this->guardian;
    }

    /**
     * @throws Exception
     */
    public function attempt(array $data, ?string $authenticator = null, ?TokenInterface $token = null): AuthenticatorInterface
    {
        return $this->getGuardian()->attempt($data, $authenticator, $token);
    }

    /**
     * @throws Exception
     */
    public function login(AuthenticatableInterface $authenticatable, ?string $authenticator = null, ?TokenInterface $token = null): AuthenticatorInterface
    {
        return $this->getGuardian()->login($authenticatable, $authenticator, $token);
    }

    public function getProfile(): Authenticatable
    {
        return auth()->user();
    }

    public function updateProfile(array $data): bool
    {
        return $this->update(auth()->user(), $data);
    }

    public function updatePassword(array $data): bool
    {
        return $this->update(auth()->user(), $data);
    }

    public function logout(): void
    {
        auth()->user()->currentAccessToken()->delete();
    }
}
