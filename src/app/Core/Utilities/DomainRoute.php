<?php

namespace App\Core\Utilities;

use App\Core\Traits\ApiResponse as ApiResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class DomainRoute
{
    public static function new(): static
    {
        return new static();
    }

    public function register(): void
    {
        $this->mapDomainRoutes();
    }

    private function mapDomainRoutes(): void
    {
        $domains = glob(base_path('routes/domains/*.php'));

        foreach ($domains as $domain) {
            Route::middleware('api')
                ->prefix('api')
                ->group($domain);
        }
    }
}
