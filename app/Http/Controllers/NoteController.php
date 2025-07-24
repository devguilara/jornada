<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index(){
        $notes = Auth::user()->notes()->latest()->paginate(5);
        return view('notes.index', compact('notes'));
    }

    public function create(){
       return view('notes.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
           'title' => 'required|max:255',
           'content' => 'required|max:255',
           'category' => 'required|max:255',
            'is_important' => 'boolean',
        ]);

        $validated['is_important'] = $request->has('is_important');


        Auth::user()->notes()->create($validated);

        return redirect()->route('notes.index')->with('success', 'Nota criada com sucesso!');
    }

    public function show(string $id){
        $notes = Note::findOrFail($id);
        if($notes->user_id !== Auth::id()){
            abort(403);
        }
        return view('notes.show', compact('notes'));
    }

    public function edit(string $id){
        $notes = Note::findOrFail($id);
        if($notes->user_id !== Auth::id()){
            abort(403);
        }

        return view('notes.edit', compact('notes'));
    }

    public function update(Request $request, string $id){
        $notes = Note::findOrFail($id);
        if($notes->user_id !== Auth::id()){
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'category' => 'required|max:255',
            'is_important' => 'boolean',
        ]);

        $validated['is_important'] = $request->has('is_important');
        $notes->update($validated);
        return redirect()->route('notes.index')->with('success', 'Nota editada com sucesso!');
    }

    public function destroy(string $id){
        $notes = Note::findOrFail($id);
        if($notes->user_id !== Auth::id()){
            abort(403);
        }

        $notes->delete();
        return redirect()->route('notes.index')->with('success', 'Nota deletada com sucesso!');
    }
}
