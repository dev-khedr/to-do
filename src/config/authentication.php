<?php

use Raid\Core\Authentication\Channels\DefaultChannel;
use Raid\Core\Authentication\Workers\EmailWorker;
use Raid\Core\Authentication\Workers\PhoneWorker;

return [

    'default_channel' => DefaultChannel::class,

    'authenticator_channels' => [],

    'channel_workers' => [
        DefaultChannel::class => [
            EmailWorker::class,
            PhoneWorker::class
        ]
    ],
];
