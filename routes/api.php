<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\foodController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('foods')->group(function () {
    Route::get('/all', [foodController::class, 'getFoods']);
    Route::post('/new', [foodController::class, 'newFood']);
    Route::get('/{id}', [foodController::class, 'getFood']);
    Route::put('/{id}', [foodController::class, 'updateFood']);
    Route::delete('/{id}', [foodController::class, 'deleteFood']);
});

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});
