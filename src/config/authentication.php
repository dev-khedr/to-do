<?php

use App\Http\Authentication\Channels\EmailTwoFactorChannel;
use App\Http\Authentication\Channels\PhoneTwoFactorChannel;
use App\Http\Authentication\Channels\SystemChannel;
use App\Http\Authentication\Steps\EmailTwoFactorStep;
use App\Http\Authentication\Steps\PhoneTwoFactorStep;
use App\Http\Authentication\Workers\PhoneWorker;
use Raid\Core\Authentication\Rules\MatchingPasswordRule;
use Raid\Core\Authentication\Workers\EmailWorker;

return [

    'default_channel' => SystemChannel::class,

    'authenticator_channels' => [],

    'channel_workers' => [
        SystemChannel::class => [
            EmailWorker::class,
            PhoneWorker::class,
        ],
        EmailTwoFactorChannel::class => [
            EmailWorker::class,
        ],
        PhoneTwoFactorChannel::class => [
            PhoneWorker::class,
        ],
    ],

    'channel_rules' => [
        SystemChannel::class => [
            MatchingPasswordRule::class,
        ],
        EmailTwoFactorChannel::class => [
            MatchingPasswordRule::class,
        ],
        PhoneTwoFactorChannel::class => [
            MatchingPasswordRule::class,
        ],
    ],

    'channel_steps' => [
        EmailTwoFactorChannel::class => [
            EmailTwoFactorStep::class,
        ],
        PhoneTwoFactorChannel::class => [
            PhoneTwoFactorStep::class,
        ],
    ],

];
