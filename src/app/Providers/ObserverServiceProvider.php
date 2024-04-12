<?php

namespace App\Providers;

use App\Models\TaskList;
use App\Observers\TaskListObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        TaskList::observe(TaskListObserver::class);
    }
}
