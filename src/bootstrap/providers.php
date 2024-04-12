<?php

return [
    // infrastructure providers
    App\Providers\AppServiceProvider::class,
    App\Providers\HelperServiceProvider::class,

    // package providers
    EloquentFilter\ServiceProvider::class,
    Lanin\Laravel\ApiDebugger\ServiceProvider::class,

    // domain providers
    App\Providers\Domain\AdminServiceProvider::class,
    App\Providers\Domain\TaskServiceProvider::class,
    App\Providers\Domain\TaskListServiceProvider::class,
    App\Providers\Domain\UserServiceProvider::class,
];
