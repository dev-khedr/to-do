<?php

return [
    // domain providers
    App\Providers\Domain\AdminServiceProvider::class,
    App\Providers\Domain\TaskServiceProvider::class,
    App\Providers\Domain\TaskListServiceProvider::class,
    App\Providers\Domain\UserServiceProvider::class,

    // infrastructure providers
    App\Providers\AppServiceProvider::class,
    App\Providers\HelperServiceProvider::class,
    App\Providers\ObserverServiceProvider::class,

    // package providers
    EloquentFilter\ServiceProvider::class,
    Lanin\Laravel\ApiDebugger\ServiceProvider::class,
    Tymon\JWTAuth\Providers\LaravelServiceProvider::class,
];
