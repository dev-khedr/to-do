<?php

namespace App\Services;

use App\Core\Services\Contracts\ServiceInterface;
use App\Core\Services\Service;
use App\Repositories\Contracts\TaskListRepositoryInterface;

class TaskListService extends Service implements ServiceInterface
{
    public function __construct(TaskListRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }
}
