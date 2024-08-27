<?php

namespace App\Http\Authentication\Guardians;

use App\Http\Authentication\Authenticators\SystemAuthenticator;
use App\Models\Admin;
use Raid\Guardian\Authenticators\Authenticator;
use Raid\Guardian\Authenticators\Contracts\AuthenticatorInterface;
use Raid\Guardian\Guardians\Contracts\GuardianInterface;
use Raid\Guardian\Guardians\Guardian;

class AdminGuardian extends Guardian implements GuardianInterface
{
    public const NAME = 'admin';

    protected string $authenticatable = Admin::class;

    protected array $authenticators = [
        SystemAuthenticator::class,
    ];
}
