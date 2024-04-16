<?php

namespace App\Http\Authentication\Authenticators;

use App\Http\Authentication\Channels\SystemChannel;
use App\Models\User;
use Raid\Core\Authentication\Authenticators\Authenticator;

class UserAuthenticator extends Authenticator
{
    public const NAME = 'user';

    protected string $authable = User::class;

    protected string $defaultChannel = SystemChannel::class;
}
