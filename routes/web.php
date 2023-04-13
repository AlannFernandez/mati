<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaracterController;    




// home
Route::view('/', 'index');

// Characters
Route::get('/character', [CaracterController::class, 'getCaracter'])->name('characters.all');
Route::get('/character/{id}', [CaracterController::class, 'getCaracterById'])->name('character.show');

// Captions

// Locatios


Route::get('/filter', [CaracterController::class, 'filterCharacters'])->name('characters.filter');

Route::get('/download', [CaracterController::class, 'downloadExcel'])->name('download.excel');