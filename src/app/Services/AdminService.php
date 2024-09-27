<?php

namespace App\Services;

use App\Core\Services\AuthenticationService;
use App\Core\Services\Contracts\ServiceInterface;
use App\Http\Authentication\Guardians\AdminGuardian;
use App\Repositories\Contracts\AdminRepositoryInterface;

class AdminService extends AuthenticationService implements ServiceInterface
{
    public function __construct(AdminRepositoryInterface $repository, AdminGuardian $guardian)
    {
        $this->setRepository($repository);
        $this->setGuardian($guardian);
    }
}
