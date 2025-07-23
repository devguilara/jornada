<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index(){
        $notes = Auth::user()->notes()->latest()->paginate(5);
        return view('notes.index', compact('notes'));
    }

}
