<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\PlayersController;



use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // MATCHES
    Route::get('/matches', [MatchesController::class, 'index'])->name('matches');
    Route::get('/matches/create', [MatchesController::class, 'create'])->middleware('checkRole:administrator')->name('matches.create');
    Route::post('/matches/create', [MatchesController::class, 'store'])->middleware('checkRole:administrator')->name('matches.create');
    Route::get('/matches/{id}/edit', [MatchesController::class, 'edit'])->middleware('checkRole:administrator')->name('match.edit');
    Route::put('/matches/{id}/edit', [MatchesController::class, 'update'])->middleware('checkRole:administrator')->name('match.update');
    Route::delete('/matches/{id}/delete', [MatchesController::class, 'destroy'])->middleware('checkRole:administrator')->name('match.delete');


    // TEAMS
    Route::get('/teams', [TeamsController::class, 'index'])->middleware('checkRole:administrator')->name('teams');
    Route::get('/team/create', [TeamsController::class, 'create'])->middleware('checkRole:administrator')->name('team.create');
    Route::post('/team/create', [TeamsController::class, 'store'])->middleware('checkRole:administrator')->name('team.create');
    Route::get('/team/{id}/edit', [TeamsController::class, 'edit'])->middleware('checkRole:administrator')->name('team.edit');
    Route::put('/team/{id}/edit', [TeamsController::class, 'update'])->middleware('checkRole:administrator')->name('team.update');
    Route::delete('/team/{id}/delete', [TeamsController::class, 'destroy'])->middleware('checkRole:administrator')->name('team.delete');


    // PLAYERS
    Route::get('/players', [PlayersController::class, 'index'])->middleware('checkRole:administrator')->name('players');
    Route::get('/player/create', [PlayersController::class, 'create'])->middleware('checkRole:administrator')->name('player.create');
    Route::post('/player/create', [PlayersController::class, 'store'])->middleware('checkRole:administrator')->name('player.create');
    Route::get('/player/{id}/edit', [PlayersController::class, 'edit'])->middleware('checkRole:administrator')->name('player.edit');
    Route::put('/player/{id}/edit', [PlayersController::class, 'update'])->middleware('checkRole:administrator')->name('player.update');
    Route::delete('/player/{id}/delete', [PlayersController::class, 'destroy'])->middleware('checkRole:administrator')->name('player.delete');
});

require __DIR__ . '/auth.php';
