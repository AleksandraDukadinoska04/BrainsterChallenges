<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('login', function () {
    if (session()->exists('name') && session()->exists('lastname')) {
        return redirect()->route('info');
    }
    return view('login');
});
Route::post('login', [\App\Http\Controllers\UserController::class, 'register'])->name('login');

Route::get('info', function () {
    if (!session()->exists('name') && !session()->exists('lastname')) {
        return redirect()->route('login');
    }
    return view('info');
})->name('info');

Route::get('logout', function () {
    if (!session()->exists('name') && !session()->exists('lastname')) {
        return redirect()->route('home');
    }
    session()->forget(['name', 'lastname', 'email']);
    return redirect()->route('home');
})->name('logout');
