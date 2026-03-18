<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\BoardController;
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
        Route::post('/{project}/characters/{character}/pin', [ProjectController::class, 'togglePin'])->name('characters.pin');
        
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

    // --- Sequence ---
    Route::post('/projects/{id}/sequence', [ProjectController::class, 'storeSequence'])->name('projects.sequence.store');
    Route::get('/projects/{id}/sequence/{sequenceId}/edit', [ProjectController::class, 'editSequence'])->name('projects.sequence.edit');
    Route::put('/projects/{id}/sequence/{sequenceId}', [ProjectController::class, 'updateSequence'])->name('projects.sequence.update');
    Route::delete('/projects/{id}/sequence/{sequenceId}', [ProjectController::class, 'destroySequence'])->name('projects.sequence.destroy');


    // --- Board ---
    Route::prefix('projects/{project}/board')->name('board.')->group(function () {
        Route::get('/', [BoardController::class, 'index'])->name('index');
        
        // mange notes (AJAX)
        Route::post('/notes', [BoardController::class, 'storeNote'])->name('notes.store');
        Route::put('/notes/{boardNote}/content', [BoardController::class, 'updateNoteContent'])->name('notes.content');
        Route::put('/notes/{boardNote}/position', [BoardController::class, 'updateNotePosition'])->name('notes.position');
        Route::delete('/notes/{boardNote}', [BoardController::class, 'destroyNote'])->name('notes.destroy');

        
        // manage links (AJAX)
        Route::post('/links', [BoardController::class, 'storeLink'])->name('links.store');
        Route::delete('/links/{boardLink}', [BoardController::class, 'destroyLink'])->name('links.destroy');
        Route::put('/links/{boardLink}/label', [BoardController::class, 'updateLinkLabel'])->name('links.label');
        Route::delete('/clear', [BoardController::class, 'clearBoard'])->name('clear');
        
    });
});

/*

* Settings / Admin Zone

*/
require __DIR__.'/settings.php';