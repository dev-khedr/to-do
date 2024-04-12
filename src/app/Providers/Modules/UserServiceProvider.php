<?php

namespace App\Providers\Modules;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, function () {
            return new UserRepository(new User());
        });
    }

    public function boot(): void
    {
        //
    }

    public function provides(): array
    {
        return [UserRepositoryInterface::class];
    }
}
