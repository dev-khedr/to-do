<?php

namespace App\Http\Authentication\Authenticators;

use App\Http\Authentication\Channels\SystemChannel;
use Raid\Core\Authentication\Authenticators\Authenticator;

class AdminAuthenticator extends Authenticator
{
    public const NAME = 'admin';

    protected string $authable = AdminAuthenticator::class;

    protected string $defaultChannel = SystemChannel::class;
}
