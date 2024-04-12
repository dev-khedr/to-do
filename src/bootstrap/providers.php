<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\HelperServiceProvider::class,
    App\Providers\Domains\UserServiceProvider::class,
    EloquentFilter\ServiceProvider::class,
    Lanin\Laravel\ApiDebugger\ServiceProvider::class,
];
