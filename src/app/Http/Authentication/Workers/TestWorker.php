<?php

namespace App\Http\Authentication\Workers;

use Raid\Core\Auth\Authentication\Contracts\AuthWorkerInterface;
use Raid\Core\Auth\Authentication\AuthWorker;

class TestWorker extends Worker implements WorkerInterface
{
    public const ATTRIBUTE = '';
}