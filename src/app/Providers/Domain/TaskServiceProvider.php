<?php

namespace App\Providers\Domain;

use App\Models\Task;
use App\Repositories\Contracts\TaskRepositoryInterface;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class, function () {
            return new TaskRepository(new Task());
        });
    }

    public function provides(): array
    {
        return [TaskRepositoryInterface::class];
    }
}
