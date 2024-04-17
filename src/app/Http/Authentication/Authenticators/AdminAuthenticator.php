<?php

namespace App\Http\Authentication\Authenticators;

use App\Http\Authentication\Channels\SystemChannel;
use App\Models\Admin;
use Raid\Core\Authentication\Authenticators\Authenticator;
use Raid\Core\Authentication\Authenticators\Contracts\AuthenticatorInterface;

class AdminAuthenticator extends Authenticator implements AuthenticatorInterface
{
    public const NAME = 'admin';

    protected string $authable = Admin::class;

    protected array $channels = [
        SystemChannel::class,
    ];
}
