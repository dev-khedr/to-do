<?php

namespace App\Http\Authentication\Matchers;

use Raid\Guardian\Matchers\Contracts\MatcherInterface;
use Raid\Guardian\Matchers\Matcher;

class EmailMatcher extends Matcher implements MatcherInterface
{
    public const ATTRIBUTE = 'email';
}
