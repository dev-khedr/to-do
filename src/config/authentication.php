<?php

use App\Http\Authentication\Channels\TwoFactorEmailChannel;
use App\Http\Authentication\Channels\TwoFactorPhoneChannel;
use App\Http\Authentication\Channels\SystemChannel;
use App\Http\Authentication\Steps\TwoFactorEmailStep;
use App\Http\Authentication\Steps\TwoFactorPhoneStep;
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
        TwoFactorEmailChannel::class => [
            EmailWorker::class,
        ],
        TwoFactorPhoneChannel::class => [
            PhoneWorker::class,
        ],
    ],

    'channel_rules' => [
        SystemChannel::class => [
            MatchingPasswordRule::class,
        ],
        TwoFactorEmailChannel::class => [
            MatchingPasswordRule::class,
        ],
        TwoFactorPhoneChannel::class => [
            MatchingPasswordRule::class,
        ],
    ],

    'channel_steps' => [
        TwoFactorEmailChannel::class => [
            TwoFactorEmailStep::class,
        ],
        TwoFactorPhoneChannel::class => [
            TwoFactorPhoneStep::class,
        ],
    ],

];
