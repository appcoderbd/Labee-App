<?php

use App\Http\Controllers\Api\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [ApiUserController::class, 'register']);
Route::post('/login', [ApiUserController::class, 'login']);

Route::get('/login', fn() => response()->json(['message' => 'Please login to access this resource'], 401))->name('login');


Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [ApiUserController::class, 'logout']);

});

