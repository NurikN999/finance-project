<?php

use App\Http\Controllers\Api\V1\Card\CardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\User\UserController;


Route::prefix('v1')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::post('/users', [UserController::class, 'store']);

    Route::get('/users/{user}/cards', [CardController::class, 'getUserCard']);
    Route::post('/cards', [CardController::class, 'store']);
    Route::get('/cards', [CardController::class, 'index']);
});
