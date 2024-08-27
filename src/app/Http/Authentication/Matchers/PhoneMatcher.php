<?php

namespace App\Http\Authentication\Matchers;

use Raid\Guardian\Matchers\Contracts\MatcherInterface;
use Raid\Guardian\Matchers\Matcher;
use Raid\Guardian\Workers\Contracts\WorkerInterface;
use Raid\Guardian\Workers\Worker;

class PhoneMatcher extends Matcher implements MatcherInterface
{
    public const ATTRIBUTE = 'phone';
}
