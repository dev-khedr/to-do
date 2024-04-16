<?php

namespace App\Core\Services;

use App\Core\Services\Contracts\ServiceInterface;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;
use Raid\Core\Authentication\Authenticators\Contracts\AuthenticatorInterface;

abstract class AccountService extends Service implements ServiceInterface
{
    protected AuthenticatorInterface $authenticator;

    protected function setAuthenticator(AuthenticatorInterface $authenticator): void
    {
        $this->authenticator = $authenticator;
    }

    public function authenticator(): AuthenticatorInterface
    {
        return $this->authenticator;
    }

    /**
     * @throws Exception|AuthenticationException
     */
    public function login(array $data): string
    {
        $channel = $this->authenticator()->attempt($data);

        if ($channel->errors()->any()) {
            throw new AuthenticationException(__('auth.failed'));
        }

        return $channel->getStringToken();
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
        auth()->logout(true);
    }
}
