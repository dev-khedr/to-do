<?php

namespace App\Providers\Domains;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
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

    public function provides(): array
    {
        return [UserRepositoryInterface::class];
    }
}
