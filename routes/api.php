<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\foodController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('food')->group(function(){
    Route::get('/all', [foodController::class, 'getFoods']);
    Route::get('/{id}', [foodController::class, 'getFood']);
    Route::post('/new', [foodController::class, 'newFood']);
    Route::delete('/{id}', [foodController::class, 'deleteFood']);
    Route::put('update/{id}', [foodController::class, 'updateFood']);
});