<?php

use App\Http\Authentication\Channels\SystemChannel;
use App\Http\Authentication\Rules\VerifiedRule;
use Raid\Core\Authentication\Channels\DefaultChannel;
use Raid\Core\Authentication\Rules\MatchingPasswordRule;
use Raid\Core\Authentication\Workers\EmailWorker;
use Raid\Core\Authentication\Workers\PhoneWorker;

return [

    'default_channel' => SystemChannel::class,

    'authenticator_channels' => [],

    'channel_workers' => [
        SystemChannel::class => [
            EmailWorker::class,
            PhoneWorker::class
        ]
    ],

    'channel_rules' => [
        SystemChannel::class => [
            MatchingPasswordRule::class,
            VerifiedRule::class,
        ],
    ],
];
