<?php

namespace App\Http\Authentication\Workers;

use Raid\Guardian\Workers\Contracts\WorkerInterface;
use Raid\Guardian\Workers\Worker;

class PhoneWorker extends Worker implements WorkerInterface
{
    public const ATTRIBUTE = 'phone';
}
