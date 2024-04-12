<?php

namespace App\Services;

use App\Core\Services\Contracts\ServiceInterface;
use App\Core\Services\Service;
use App\Repositories\Contracts\TaskRepositoryInterface;

class TaskService extends Service implements ServiceInterface
{
    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }
}
