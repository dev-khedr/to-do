<?php

namespace App\Core\Services;

use App\Core\Services\Contracts\ServiceInterface;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Raid\Core\Authentication\Authenticators\Contracts\AuthenticatorInterface;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;

abstract class AuthenticationService extends Service implements ServiceInterface
{
    protected AuthenticatorInterface $authenticator;

    protected function setAuthenticator(AuthenticatorInterface $authenticator): void
    {
        $this->authenticator = $authenticator;
    }

    public function getAuthenticator(): AuthenticatorInterface
    {
        return $this->authenticator;
    }

    /**
     * @throws Exception
     */
    public function attempt(array $data, ?string $channel = null): ChannelInterface
    {
        return $this->getAuthenticator()->attempt($data, $channel);
    }

    /**
     * @throws Exception
     */
    public function login(Authenticatable $authenticatable, ?string $channel = null): ChannelInterface
    {
        return $this->getAuthenticator()->login($authenticatable, $channel);
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
