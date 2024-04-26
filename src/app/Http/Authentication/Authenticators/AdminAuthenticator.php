<?php

namespace App\Http\Authentication\Authenticators;

use App\Http\Authentication\Channels\SystemChannel;
use App\Models\Admin;
use Raid\Guardian\Authenticators\Authenticator;
use Raid\Guardian\Authenticators\Contracts\AuthenticatorInterface;

class AdminAuthenticator extends Authenticator implements AuthenticatorInterface
{
    public const NAME = 'admin';

    protected string $authenticates = Admin::class;

    protected array $channels = [
        SystemChannel::class,
    ];
}
