<?php

namespace App\Core\Utilities;

use Illuminate\Support\Facades\Route;

class DomainRoute
{
    public static function new(): static
    {
        return new static;
    }

    public function register(): void
    {
        $this->mapDomainRoutes();
    }

    private function mapDomainRoutes(): void
    {
        $domains = glob(base_path('routes/domain/*.php'));

        foreach ($domains as $domain) {
            Route::middleware('api')
                ->prefix('api')
                ->group($domain);
        }
    }
}
