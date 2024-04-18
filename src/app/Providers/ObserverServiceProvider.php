<?php

namespace App\Providers;

use App\Models\TaskList;
use App\Models\Verification;
use App\Observers\TaskListObserver;
use App\Observers\VerificationObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        TaskList::observe(TaskListObserver::class);
        Verification::observe(VerificationObserver::class);
    }
}
