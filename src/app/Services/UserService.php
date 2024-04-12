<?php

namespace App\Services;

use App\Core\Services\Contracts\ServiceInterface;
use App\Core\Services\Service;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;

class UserService extends Service implements ServiceInterface
{
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }

    /**
     * @throws AuthenticationException
     */
    public function login(array $data): string
    {
        $token = auth()->attempt($data);

        if (! $token) {
            throw new AuthenticationException(__('auth.failed'));
        }

        return $token;
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
        auth()->logout();
    }
}
