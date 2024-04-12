<?php

namespace App\Providers\Domain;

use App\Models\TaskList;
use App\Repositories\Contracts\TaskListRepositoryInterface;
use App\Repositories\TaskListRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class TaskListServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(TaskListRepositoryInterface::class, function () {
            return new TaskListRepository(new TaskList());
        });
    }

    public function provides(): array
    {
        return [TaskListRepositoryInterface::class];
    }
}
