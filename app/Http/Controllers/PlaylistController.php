<?php

namespace App\Http\Controllers;
use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Auth::user()->playlists()->latest()->get();
        return view('playlists.index', compact('playlists'));
    }

    public function create()
    {
        return view('playlists.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Auth::user()->playlists()->create($validated);

        return redirect()->route('playlists.index')->with('success', 'Playlist criada com sucesso!');
    }

    public function show(Playlist $playlist)
    {
        if($playlist->user_id !== Auth::id()){
            return redirect()->route('playlists.index');
        }
        $songs = $playlist->songs()->orderBy('stage')->orderBy('order')->get();

        $songsByStage = $songs->groupBy('stage');

        return view('playlists.show', compact('playlist', 'songsByStage'));
    }

    public function edit(Playlist $playlist)
    {
        if($playlist->user_id !== Auth::id()){
            abort(403);
        }
        return view('playlists.edit', compact('playlist'));
    }

    public function update(Request $request, Playlist $playlist)
    {
        if($playlist->user_id!== Auth::id()){
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $playlist->update($validated);
        return redirect()->route('playlists.index')->with('success', 'Playlist atualizada com sucesso!');
    }

    public function destroy(Playlist $playlist)
    {
        if($playlist->user_id !== Auth::id()){
            abort(403);
        }

        $playlist->delete();
        return redirect()->route('playlists.index')->with('success', 'Playlist deletada com sucesso!');
    }

    public function storeSong(Request $request, Playlist $playlist){
        if ($playlist->user_id !== Auth::id()){
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string',
            'link' => 'nullable|string',
            'stage' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $playlist->songs()->create($validated);

        return redirect()->route('playlists.show', $playlist)->with('success', 'Song criada com sucesso!');
    }

    public function editSong(Playlist $playlist, Song $song){
        if ($playlist->user_id !== Auth::id()){
            abort(403);
        }
        return view('playlists.songs.edit', compact('playlist', 'song'));
    }

    public function updateSong(Request $request, Playlist $playlist, Song $song){
        if($playlist->user_id !== Auth::id()){
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string',
            'link' => 'nullable|string',
            'stage' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $song->update($validated);

        return redirect()->route('playlists.show', $playlist)->with('success', 'Song atualizada com sucesso!');
    }

    public function destroySong(Playlist $playlist, Song $song){
        if($playlist->user_id !== Auth::id()){
            abort(403);
        }

        $song->delete();
        return redirect()->route('playlists.show', $playlist)->with('success', 'Song deletada com sucesso!');
    }

}
