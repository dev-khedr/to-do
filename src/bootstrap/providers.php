<?php

return [
    // Domain
    App\Providers\Domain\AdminServiceProvider::class,
    App\Providers\Domain\TaskServiceProvider::class,
    App\Providers\Domain\TaskListServiceProvider::class,
    App\Providers\Domain\UserServiceProvider::class,

    // Application
    App\Providers\AppServiceProvider::class,
    App\Providers\AuthenticationServiceProvider::class,
    App\Providers\HelperServiceProvider::class,

    // Packages
    EloquentFilter\ServiceProvider::class,
    Lanin\Laravel\ApiDebugger\ServiceProvider::class,
];
