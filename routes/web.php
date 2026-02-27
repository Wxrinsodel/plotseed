<?php

use Illuminate\Support\Facades\Route;


/*
 * Public routes
 */

Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('home');

Route::get('projects', [\App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('projects/{project}', [\App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');
    
/*
 * User zone routes
 */

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


require __DIR__.'/settings.php';


/*
 * Admin zone routes
 */
