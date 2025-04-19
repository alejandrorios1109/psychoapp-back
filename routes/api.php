<?php

use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['message' => 'Hi bitch!!']);
});

Route::post('/register', [JWTAuthController::class, 'register']);
Route::post('/login', [JWTAuthController::class, 'login']);

Route::middleware('jwt')->group(function () {
    Route::get('/user', [JWTAuthController::class, 'getUser']);
    Route::post('/logout', [JWTAuthController::class, 'logout']);
    Route::put('/user', [JWTAuthController::class, 'updateUser']);

    Route::get('/reservations', [AppController::class, 'getReservations']);
    
    Route::get('/reservations/{id}', [AppController::class, 'getReservationsProfesional']);
});