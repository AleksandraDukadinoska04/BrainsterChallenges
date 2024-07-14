<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

Route::get('/', [WebsiteController::class, 'showHome'])->name('home');
Route::get('/aboutMe', [WebsiteController::class, 'showAboutMe'])->name('aboutMe');
Route::get('/samplePost', [WebsiteController::class, 'showSamplePost'])->name('samplePost');
Route::get('/contact', [WebsiteController::class, 'showContact'])->name('contact');
