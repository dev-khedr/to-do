<?php

namespace App\Http\Authentication\Authenticators;

use App\Http\Authentication\Channels\EmailTwoFactorChannel;
use App\Http\Authentication\Channels\SystemChannel;
use App\Http\Authentication\Steps\PhoneTwoFactorStep;
use App\Models\User;
use Raid\Core\Authentication\Authenticators\Authenticator;
use Raid\Core\Authentication\Authenticators\Contracts\AuthenticatorInterface;

class UserAuthenticator extends Authenticator implements AuthenticatorInterface
{
    public const NAME = 'user';

    protected string $authable = User::class;

    protected array $channels = [
        SystemChannel::class,
        EmailTwoFactorChannel::class,
        PhoneTwoFactorStep::class,
    ];
}
