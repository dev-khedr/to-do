<?php

namespace App\Http\Authentication\Authenticators;

use App\Http\Authentication\Channels\SystemChannel;
use App\Models\Admin;
use Raid\Core\Authentication\Authenticators\Authenticator;

class AdminAuthenticator extends Authenticator
{
    public const NAME = 'admin';

    protected string $authable = Admin::class;
}
