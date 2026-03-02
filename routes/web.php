<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;


/*
 * Public routes
 */

Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('home');

Route::resource('projects', ProjectController::class);
Route::get('projects/{project}', [\App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');

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
