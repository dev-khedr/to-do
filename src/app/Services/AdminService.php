<?php

namespace App\Services;

use App\Core\Services\Contracts\ServiceInterface;
use App\Core\Services\Service;
use App\Repositories\Contracts\AdminRepositoryInterface;

class AdminService extends Service implements ServiceInterface
{
    public function __construct(AdminRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }
}
