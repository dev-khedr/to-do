<?php

namespace App\Services;

use App\Core\Services\Contracts\ServiceInterface;
use App\Core\Services\Service;
use App\Repositories\Contracts\AdminRepositoryInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class AdminService extends Service implements ServiceInterface
{
    public function __construct(AdminRepositoryInterface $repository)
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
}
