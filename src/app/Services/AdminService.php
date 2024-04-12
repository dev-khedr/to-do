<?php

namespace App\Services;

use App\Core\Services\AccountService;
use App\Core\Services\Contracts\ServiceInterface;
use App\Repositories\Contracts\AdminRepositoryInterface;

class AdminService extends AccountService implements ServiceInterface
{
    public function __construct(AdminRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }
}
