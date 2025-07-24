<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PlaylistSongController; // <<-- Importe este Controller
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NoteController; // <<-- Importe este Controller
use App\Models\Playlist; // <<-- Importe o Model Playlist
use App\Models\Image;    // <<-- Importe o Model Image
use App\Models\Note;     // <<-- Importe o Model Note
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // <<-- Importe o Auth

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rota da Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Rotas autenticadas e verificadas
Route::middleware(['auth', 'verified'])->group(function () {
    // Rota do Dashboard - AGORA PASSA AS CONTAGEENS
    Route::get('/dashboard', function () {
        $user = Auth::user();
        $playlistCount = $user->playlists()->count();
        $imageCount = $user->images()->count();
        $noteCount = $user->notes()->count();

        return view('dashboard', compact('playlistCount', 'imageCount', 'noteCount'));
    })->name('dashboard');

    // Rotas de Perfil (Profile)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para Playlists (Recurso Completo)
    Route::resource('playlists', PlaylistController::class);

    // Rotas para Músicas dentro de Playlists (aninhadas)
    // Usamos rotas individuais para flexibilidade e para apontar para PlaylistSongController
    Route::post('/playlists/{playlist}/songs', [PlaylistSongController::class, 'store'])->name('playlists.songs.store');
    Route::get('/playlists/{playlist}/songs/{song}/edit', [PlaylistSongController::class, 'edit'])->name('playlists.songs.edit');
    Route::put('/playlists/{playlist}/songs/{song}', [PlaylistSongController::class, 'update'])->name('playlists.songs.update');
    Route::delete('/playlists/{playlist}/songs/{song}', [PlaylistSongController::class, 'destroy'])->name('playlists.songs.destroy');
    // Se você tiver um método 'show' para músicas, adicione aqui:
    // Route::get('/playlists/{playlist}/songs/{song}', [PlaylistSongController::class, 'show'])->name('playlists.songs.show');

    // Rotas para a Galeria de Imagens (listadas individualmente para evitar problemas de Route Model Binding)
    Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');
    Route::get('gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // Rotas para Anotações (listadas individualmente para evitar problemas de Route Model Binding)
    Route::get('notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('notes/create', [NoteController::class, 'create'])->name('notes.create');
    Route::post('notes', [NoteController::class, 'store'])->name('notes.store');
    Route::get('notes/{id}', [NoteController::class, 'show'])->name('notes.show');
    Route::get('notes/{id}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    Route::put('notes/{id}', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');
});

// Inclui as rotas de autenticação (login, register, etc.)
require __DIR__.'/auth.php';