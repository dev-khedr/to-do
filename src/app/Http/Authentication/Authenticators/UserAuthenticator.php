<?php

namespace App\Http\Authentication\Authenticators;

use App\Http\Authentication\Channels\SystemChannel;
use App\Http\Authentication\Channels\TwoFactorEmailChannel;
use App\Http\Authentication\Channels\TwoFactorPhoneChannel;
use App\Models\User;
use Raid\Guardian\Authenticators\Authenticator;
use Raid\Guardian\Authenticators\Contracts\AuthenticatorInterface;

class UserAuthenticator extends Authenticator implements AuthenticatorInterface
{
    public const NAME = 'user';

    protected string $authenticates = User::class;

    protected array $channels = [
        SystemChannel::class,
        TwoFactorEmailChannel::class,
        TwoFactorPhoneChannel::class,
    ];
}
