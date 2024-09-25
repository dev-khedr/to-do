<?php

namespace App\Http\Authentication\Guardians;

use App\Http\Authentication\Authenticators\GoogleAuthenticator;
use App\Http\Authentication\Authenticators\SystemAuthenticator;
use App\Http\Authentication\Authenticators\TwoFactorEmailAuthenticator;
use App\Http\Authentication\Authenticators\TwoFactorPhoneAuthenticator;
use App\Models\User;
use Raid\Guardian\Guardians\Contracts\GuardianInterface;
use Raid\Guardian\Guardians\Guardian;

class UserGuardian extends Guardian implements GuardianInterface
{
    public const NAME = 'user';

    protected string $authenticatable = User::class;

    protected array $authenticators = [
        SystemAuthenticator::class,
        TwoFactorEmailAuthenticator::class,
        TwoFactorPhoneAuthenticator::class,
        GoogleAuthenticator::class,
    ];
}
