<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{

    public function index()
    {
        $images = Auth::user()->images()->latest()->get();
        return view('gallery.index', compact('images'));
    }


    public function create()
    {
        return view('gallery.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image_file')->store('gallery', 'public');

        Image::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'filename' => $request->file('image_file')->getClientOriginalName(),
            'filepath' => Storage::url($path),
            'category' => $request->category,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Imagem adicionada com sucesso!');
    }

    public function show(string $id)
    {
        echo  Auth::user();

        $image = Image::findOrFail($id);
        if ($image->user_id !== Auth::id()) {
            abort(403);
        }
        return view('gallery.show', compact('image'));
    }

    public function edit(string $id)
    {
        $image = Image::findOrFail($id);

        if ($image->user_id !== Auth::id()) {
            abort(403);
        }

        return view('gallery.edit', compact('image'));
    }


    public function update(Request $request, string $id)
    {
        $image = Image::findOrFail($id);
        if ($image->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'category' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['title', 'description', 'category']);


        $image->update($data);

        return redirect()->route('gallery.index')->with('success', 'Imagem atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $image = Image::findOrFail($id);

        if ($image->user_id !== Auth::id()) {
            abort(403);
        }

        $filePathToDelete = str_replace('/storage/', '', $image->filepath);
        if ($image->filepath && Storage::disk('public')->exists($filePathToDelete)) {
            Storage::disk('public')->delete($filePathToDelete);
        }

        $image->delete();

        return redirect()->route('gallery.index')->with('success', 'Imagem excluída com sucesso!');
    }
}