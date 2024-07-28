<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrainsterLabs;

Route::get('/', [BrainsterLabs::class, 'showHome'])->name('home');
Route::post('storeCompany', [BrainsterLabs::class, 'storeCompany'])->name('storeCompany');
Route::get('login', [BrainsterLabs::class, 'showLogin'])->name('login');
Route::post('loginCheck', [BrainsterLabs::class, 'loginCheck'])->name('loginCheck');
Route::get('logout', [BrainsterLabs::class, 'logout'])->name('logout');
Route::get('addProject', [BrainsterLabs::class, 'showAddProject'])->name('addProject');
Route::post('storeProject', [BrainsterLabs::class, 'storeProject'])->name('storeProject');
Route::get('changeProject', [BrainsterLabs::class, 'showChangeProject'])->name('changeProject');
Route::delete('deleteProject/{id}', [BrainsterLabs::class, 'deleteProject'])->name('deleteProject');
Route::patch('updateProject/{id}', [BrainsterLabs::class, 'updateProject'])->name('updateProject');
