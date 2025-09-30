<?php

use App\Http\Controllers\NoteController;

Route::middleware(['auth', 'verified'])->prefix('notes')->group(function () {
    Route::get('/', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/create', [NoteController::class, 'create'])->name('notes.create');
    Route::post('/create', [NoteController::class, 'store'])->name('notes.store');
    Route::get('/show', [NoteController::class, 'show'])->name('notes.show');
});
