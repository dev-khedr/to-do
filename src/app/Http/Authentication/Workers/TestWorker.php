<?php

namespace App\Http\Authentication\Workers;

use Raid\Core\Authentication\Workers\Worker;
use Raid\Core\Authentication\Workers\Contracts\WorkerInterface;

class TestWorker extends Worker implements WorkerInterface
{
    public const ATTRIBUTE = '';
}
