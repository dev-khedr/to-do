<?php

namespace App\Http\Authentication\Authenticators;

use App\Http\Authentication\Channels\SystemChannel;
use App\Models\User;
use Raid\Core\Authentication\Authenticators\Authenticator;
use Raid\Core\Authentication\Authenticators\Contracts\AuthenticatorInterface;

class UserAuthenticator extends Authenticator implements AuthenticatorInterface
{
    public const NAME = 'user';

    protected string $authable = User::class;

    protected array $channels = [
        SystemChannel::class,
    ];
}
