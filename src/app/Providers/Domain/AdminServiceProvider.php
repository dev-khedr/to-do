<?php

namespace App\Providers\Domain;

use App\Models\Admin;
use App\Repositories\AdminRepository;
use App\Repositories\Contracts\AdminRepositoryInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(AdminRepositoryInterface::class, function () {
            return new AdminRepository(new Admin);
        });
    }

    public function provides(): array
    {
        return [AdminRepositoryInterface::class];
    }
}
