<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;


/*
 * Public routes
 */

Route::get('characters', [\App\Http\Controllers\CharacterController::class, 'index'])->name('characters.index');;

Route::get('projects/characters/create', [\App\Http\Controllers\CharacterController::class, 'create'])->name('characters.create');
Route::post('projects/characters', [\App\Http\Controllers\CharacterController::class, 'store'])->name('characters.store');

Route::get('projects/characters/{character}', [\App\Http\Controllers\CharacterController::class, 'show'])->name('characters.show');
Route::get('projects/characters/{character}/edit', [\App\Http\Controllers\CharacterController::class, 'edit'])->name('characters.edit');
Route::put('projects/characters/{character}', [\App\Http\Controllers\CharacterController::class, 'update'])->name('characters.update');
Route::delete('projects/characters/{character}', [\App\Http\Controllers\CharacterController::class, 'destroy'])->name('characters.destroy');



Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('home');

Route::get('projects', [\App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('projects/create', [\App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create');
Route::post('projects', [\App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store');

Route::get('projects/{id}', [\App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');
Route::get('projects/{id}/edit', [\App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
Route::put('projects/{id}', [\App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');
Route::delete('projects/{id}', [\App\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.destroy');

Route::get('projects/{id}/sequence', [\App\Http\Controllers\ProjectController::class, 'sequence'])->name('projects.sequence');
Route::get('projects/{id}/board', [\App\Http\Controllers\ProjectController::class, 'board'])->name('projects.board');


/*
 * User zone routes
 */

Route::get('dashboard', \App\Http\Controllers\DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


require __DIR__.'/settings.php';


/*
 * Admin zone routes
 */
