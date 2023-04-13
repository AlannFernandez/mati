<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaracterController;    
use App\Http\Controllers\EpisodeController;    




// home
Route::view('/', 'index');

// Characters
Route::get('/character', [CaracterController::class, 'getCaracter'])->name('characters.all');
Route::get('/character/{id}', [CaracterController::class, 'getCaracterById'])->name('character.show');

// Episodes
Route::get('/episodes', [EpisodeController::class, 'getAllEpisodes'])->name('episodes.index');
Route::get('/episodes/{id}', [EpisodeController::class,'getEpisodeById'])->name('episodes.show');
Route::get('/episodes/search', [EpisodeController::class,'search'])->name('episodes.search');

// Locatios




Route::get('/filter', [CaracterController::class, 'filterCharacters'])->name('characters.filter');

Route::get('/download', [CaracterController::class, 'downloadExcel'])->name('download.excel');