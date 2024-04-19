<?php

namespace App\Services;

use App\Core\Services\AuthenticationService;
use App\Core\Services\Contracts\ServiceInterface;
use App\Http\Authentication\Authenticators\AdminAuthenticator;
use App\Repositories\Contracts\AdminRepositoryInterface;

class AdminService extends AuthenticationService implements ServiceInterface
{
    public function __construct(AdminRepositoryInterface $repository, AdminAuthenticator $authenticator)
    {
        $this->setRepository($repository);
        $this->setAuthenticator($authenticator);
    }
}
