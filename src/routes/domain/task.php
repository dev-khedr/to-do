<?php

use App\Http\Controllers\Task;
use Illuminate\Support\Facades\Route;

// crud routes
Route::prefix('v1/tasks')
    ->group(function () {
        Route::post('/', [Task\CrudController::class, 'store']);
        Route::get('/', [Task\CrudController::class, 'index']);
        Route::get('/{id}', [Task\CrudController::class, 'show']);
        Route::put('/{id}', [Task\CrudController::class, 'update']);
        Route::delete('/{id}', [Task\CrudController::class, 'delete']);
    });
