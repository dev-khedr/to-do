<?php

namespace App\Services;

use App\Core\Services\AccountService;
use App\Core\Services\Contracts\ServiceInterface;
use App\Core\Services\Service;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;

class UserService extends AccountService implements ServiceInterface
{
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }
}
