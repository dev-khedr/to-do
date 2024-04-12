<?php

use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

// crud routes
Route::prefix('/v1/users')
    ->middleware(['auth:admin'])
    ->group(function () {
        Route::post('/', [User\CrudController::class, 'store']);
        Route::get('/', [User\CrudController::class, 'index']);
        Route::get('/{id}', [User\CrudController::class, 'show']);
        Route::put('/{id}', [User\CrudController::class, 'update']);
        Route::delete('/{id}', [User\CrudController::class, 'delete']);
    });

// auth routes
Route::prefix('/v1/users')
    ->group(function () {
        Route::post('/login', [User\LoginController::class, 'login']);
    });

// profile routes
Route::prefix('/v1/users/profile')
    ->middleware(['auth:user'])
    ->group(function () {
        Route::get('/', [User\ProfileController::class, 'get']);
        Route::post('/', [User\ProfileController::class, 'update']);
        Route::post('/password', [User\ProfileController::class, 'updatePassword']);
        Route::get('/logout', [User\ProfileController::class, 'logout']);
    });
