<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlaylistController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('playlists', PlaylistController::class);


// Rotas para as músicas, aninhadas em playlists
Route::post('/playlists/{playlist}/songs', [PlaylistController::class, 'storeSong'])->name('playlists.songs.store');
Route::get('/playlists/{playlist}/songs/{song}/edit', [PlaylistController::class, 'editSong'])->name('playlists.songs.edit');
Route::put('/playlists/{playlist}/songs/{song}', [PlaylistController::class, 'updateSong'])->name('playlists.songs.update');
Route::delete('/playlists/{playlist}/songs/{song}', [PlaylistController::class, 'destroySong'])->name('playlists.songs.destroy');
require __DIR__.'/auth.php';
