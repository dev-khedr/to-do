<?php

namespace App\Providers;

use App\Models\TaskList;
use App\Observers\TaskListObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //
    }
}
