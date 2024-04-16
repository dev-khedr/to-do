<?php

namespace App\Services;

use App\Core\Services\AccountService;
use App\Core\Services\Contracts\ServiceInterface;
use App\Http\Authentication\Authenticators\UserAuthenticator;
use App\Http\Authentication\Channels\SystemChannel;
use App\Http\Authentication\Workers\EmailWorker;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Raid\Core\Authentication\Authenticators\Authenticator;
use Raid\Core\Authentication\Channels\DefaultChannel;

class UserService extends AccountService implements ServiceInterface
{
    public function __construct(UserRepositoryInterface $repository, UserAuthenticator $authenticator)
    {
        $this->setRepository($repository);
        $this->setAuthenticator($authenticator);
    }
}
