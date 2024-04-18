<?php

namespace App\Http\Authentication\Workers;

use Raid\Core\Authentication\Workers\Contracts\WorkerInterface;
use Raid\Core\Authentication\Workers\Worker;

class PhoneWorker extends Worker implements WorkerInterface
{
    public const ATTRIBUTE = 'phone';
}
