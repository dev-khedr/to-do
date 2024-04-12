<?php

use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

// users routes
Route::prefix('v1/users')
    ->group(function () {
        Route::post('/', [User\CrudController::class, 'store']);
        Route::get('/', [User\CrudController::class, 'index']);
        Route::get('/{id}', [User\CrudController::class, 'show']);
        Route::put('/{id}', [User\CrudController::class, 'update']);
        Route::delete('/{id}', [User\CrudController::class, 'delete']);
    });
