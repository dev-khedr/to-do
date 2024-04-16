<?php

namespace App\Http\Authentication\Workers;

use Raid\Core\Authentication\Workers\Contracts\WorkerInterface;
use Raid\Core\Authentication\Workers\Worker;

class EmailWorker extends Worker implements WorkerInterface
{
    public const COLUMN = 'email';
}
