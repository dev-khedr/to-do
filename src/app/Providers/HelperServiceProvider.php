<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerHelpers();
    }

    public function boot(): void
    {
        //
    }

    protected function registerHelpers(): void
    {
        $helpers = glob(app_path('Core/helpers/*.php'));

        foreach ($helpers as $helper) {
            require_once $helper;
        }
    }
}
