<?php

namespace App\Services;

use App\Core\Services\AuthenticationService;
use App\Core\Services\Contracts\ServiceInterface;
use App\Http\Authentication\Guardians\UserGuardian;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserService extends AuthenticationService implements ServiceInterface
{
    public function __construct(UserRepositoryInterface $repository, UserGuardian $guardian)
    {
        $this->setRepository($repository);
        $this->setGuardian($guardian);
    }
}
