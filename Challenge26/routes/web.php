<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;


Route::get('/', [VehicleController::class, 'dashboard'])->name('dashboard');

Route::get('/dashboard/vehicle/create', [VehicleController::class, 'create'])->name('dashboard.vehicle.create');

Route::get('dashboard/vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('dashboard.vehicle.edit');
