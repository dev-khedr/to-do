<?php

use App\Http\Authentication\Authenticators\SystemAuthenticator;

return [

    'default_authenticator' => SystemAuthenticator::class,

    'guardian_authenticators' => [],

    'authenticator_matchers' => [],

    'authenticator_norms' => [],

    'authenticator_sequences' => [],

];
