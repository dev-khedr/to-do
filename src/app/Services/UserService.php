<?php

namespace App\Services;

use App\Core\Services\Contracts\ServiceInterface;
use App\Core\Services\Service;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserService extends Service implements ServiceInterface
{
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }
}
