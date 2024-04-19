<?php

use App\Http\Authentication\Channels\SystemChannel;

return [

    'default_channel' => SystemChannel::class,

    'authenticator_channels' => [],

    'channel_workers' => [],

    'channel_rules' => [],

    'channel_steps' => [],

];
