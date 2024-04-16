<?php

namespace App\Services;

use App\Core\Services\AccountService;
use App\Core\Services\Contracts\ServiceInterface;
use App\Http\Authentication\Authenticators\UserAuthenticator;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserService extends AccountService implements ServiceInterface
{
    public function __construct(UserRepositoryInterface $repository, UserAuthenticator $authenticator)
    {
        $this->setRepository($repository);
        $this->setAuthenticator($authenticator);
    }
}
