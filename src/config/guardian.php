<?php

use App\Http\Authentication\Authenticators\SystemAuthenticator;
use Raid\Guardian\Authenticators\DefaultAuthenticator;
use Raid\Guardian\Norms\MatchingPasswordNorm;
use Raid\Guardian\Matchers\EmailMatcher;

return [

    'default_authenticator' => SystemAuthenticator::class,

    'guardian_authenticators' => [],

    'authenticator_matchers' => [],

    'authenticator_norms' => [],

    'authenticator_sequences' => [],

];
