<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\HelperServiceProvider::class,
    App\Providers\Domain\UserServiceProvider::class,
    EloquentFilter\ServiceProvider::class,
    Lanin\Laravel\ApiDebugger\ServiceProvider::class,
];
