<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;



Route::get('/vehicles', [VehicleController::class, 'index']);

Route::post('/vehicles', [VehicleController::class, 'store']);

Route::put('/vehicles/{vehicle}', [VehicleController::class, 'update']);

Route::delete('/vehicles/{vehicle}', [VehicleController::class, 'destroy']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
