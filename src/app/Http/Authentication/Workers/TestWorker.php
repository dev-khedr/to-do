<?php

namespace App\Http\Authentication\Workers;

use Raid\Guardian\Workers\Worker;
use Raid\Guardian\Workers\Contracts\WorkerInterface;

class TestWorker extends Worker implements WorkerInterface
{
    public const ATTRIBUTE = '';
}
