<?php

use App\Http\Controllers\TaskList;
use Illuminate\Support\Facades\Route;

// crud routes
Route::prefix('/v1/task-lists')
    ->middleware(['auth:user'])
    ->group(function () {
        Route::post('/', [TaskList\CrudController::class, 'store']);
        Route::get('/', [TaskList\CrudController::class, 'index']);
        Route::get('/{id}', [TaskList\CrudController::class, 'show']);
        Route::put('/{id}', [TaskList\CrudController::class, 'update']);
        Route::delete('/{id}', [TaskList\CrudController::class, 'delete']);
    });
