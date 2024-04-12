<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

// auth routes
Route::prefix('/v1/admins')
    ->group(function () {
        Route::post('/login', [Admin\LoginController::class, 'login']);
    });

// profile routes
Route::prefix('/v1/admins/profile')
    ->middleware(['auth:admin'])
    ->group(function () {
        Route::get('/', [Admin\ProfileController::class, 'get']);
        Route::post('/', [Admin\ProfileController::class, 'update']);
        Route::post('/password', [Admin\ProfileController::class, 'updatePassword']);
        Route::get('/logout', [Admin\ProfileController::class, 'logout']);
    });

// crud routes
Route::prefix('/v1/admins')
    ->middleware(['auth:admin'])
    ->group(function () {
        Route::post('/', [Admin\CrudController::class, 'store']);
        Route::get('/', [Admin\CrudController::class, 'index']);
        Route::get('/{id}', [Admin\CrudController::class, 'show']);
        Route::put('/{id}', [Admin\CrudController::class, 'update']);
        Route::delete('/{id}', [Admin\CrudController::class, 'delete']);
    });
