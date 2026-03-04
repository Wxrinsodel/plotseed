<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CharacterController;

/*

* Public routes

*/
Route::get('/', function () {
    return view('welcome');
})->name('home');


/*

* User Zone Routes

*/
Route::middleware(['auth'])->group(function () {

    // --- Dashboard ---
    Route::get('dashboard', [DashboardController::class, '__invoke'])
        ->middleware(['verified'])
        ->name('dashboard');

    // --- Project ---
    Route::prefix('projects')->name('projects.')->group(function () {
        
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::get('/create', [ProjectController::class, 'create'])->name('create');
        Route::post('/', [ProjectController::class, 'store'])->name('store');
        
        // manage characters in project
        Route::get('/{project}/manage-characters', [ProjectController::class, 'manageCharacters'])->name('characters.manage');
        Route::put('/{project}/manage-characters', [ProjectController::class, 'updateCharacters'])->name('characters.update');

        // Workspace (Sequence & Board)
        Route::get('/{project}/sequence', [ProjectController::class, 'sequence'])->name('sequence');
        Route::get('/{project}/board', [ProjectController::class, 'board'])->name('board');

        // CRUD
        Route::get('/{project}', [ProjectController::class, 'show'])->name('show');
        Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('edit');
        Route::put('/{project}', [ProjectController::class, 'update'])->name('update');
        Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('destroy');
        
    });

    // --- Character ---
    Route::prefix('characters')->name('characters.')->group(function () {
        
        Route::get('/', [CharacterController::class, 'index'])->name('index');
        Route::get('/create', [CharacterController::class, 'create'])->name('create');
        Route::post('/', [CharacterController::class, 'store'])->name('store');
        
        Route::get('/{character}', [CharacterController::class, 'show'])->name('show');
        Route::get('/{character}/edit', [CharacterController::class, 'edit'])->name('edit');
        Route::put('/{character}', [CharacterController::class, 'update'])->name('update');
        Route::delete('/{character}', [CharacterController::class, 'destroy'])->name('destroy');
        
    });

});

/*

* Settings / Admin Zone

*/
require __DIR__.'/settings.php';