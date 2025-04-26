<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])
        ->name('users.index');
    
    Route::post('/', [UserController::class, 'store'])
        ->name('users.store');
    
    Route::get('/{id}', [UserController::class, 'show'])
        ->name('users.show')
        ->where('id', '[0-9a-f-]+');
    
    Route::put('/{id}', [UserController::class, 'update'])
        ->name('users.update')
        ->where('id', '[0-9a-f-]+');
    
    Route::delete('/{id}', [UserController::class, 'destroy'])
        ->name('users.destroy')
        ->where('id', '[0-9a-f-]+');
});
