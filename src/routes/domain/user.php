<?php

use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

// login routes
Route::prefix('/v1/users/login')
    ->group(function () {
        Route::post('/', [User\LoginController::class, 'login']);
        Route::post('/two-factor/email', [User\LoginController::class, 'loginWithTwoFactorEmail']);
        Route::post('/two-factor/phone', [User\LoginController::class, 'loginWithTwoFactorPhone']);
    });

// verification routes
Route::prefix('/v1/users/verification')
    ->group(function () {
        Route::post('/two-factor/{type}', [User\VerificationController::class, 'verifyTwoFactor'])
            ->where('type', 'email|phone');
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
