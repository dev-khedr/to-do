<?php

namespace App\Services;

use App\Core\Services\AccountService;
use App\Core\Services\Contracts\ServiceInterface;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserService extends AccountService implements ServiceInterface
{
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }
}
