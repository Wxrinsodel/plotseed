<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::orderBy('created_at', 'desc')->get();
        return view('characters.index', ['characters' => $characters]);
    }

    public function create()
    {
        return view('characters.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'role'        => ['nullable', 'string'],
            'identity'    => ['nullable', 'string'],
            'background'  => ['nullable', 'string'],
            'development' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        Character::create($data);

        return redirect()->route('characters.index');
    }
}