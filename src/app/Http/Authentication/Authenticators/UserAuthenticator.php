<?php

namespace App\Http\Authentication\Authenticators;

use App\Http\Authentication\Channels\TwoFactorEmailChannel;
use App\Http\Authentication\Channels\SystemChannel;
use App\Http\Authentication\Steps\TwoFactorPhoneStep;
use App\Models\User;
use Raid\Core\Authentication\Authenticators\Authenticator;
use Raid\Core\Authentication\Authenticators\Contracts\AuthenticatorInterface;

class UserAuthenticator extends Authenticator implements AuthenticatorInterface
{
    public const NAME = 'user';

    protected string $authenticatable = User::class;

    protected array $channels = [
        SystemChannel::class,
        TwoFactorEmailChannel::class,
        TwoFactorPhoneStep::class,
    ];
}
