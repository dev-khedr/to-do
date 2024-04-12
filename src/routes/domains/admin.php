<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

// crud routes
Route::prefix('v1/admins')
    ->group(function () {
        Route::post('/', [Admin\CrudController::class, 'store']);
        Route::get('/', [Admin\CrudController::class, 'index']);
        Route::get('/{id}', [Admin\CrudController::class, 'show']);
        Route::put('/{id}', [Admin\CrudController::class, 'update']);
        Route::delete('/{id}', [Admin\CrudController::class, 'delete']);
    });
