<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::where('user_id', auth()->id())->orderBy('updated_at', 'desc')->get();
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

        $data['user_id'] = auth()->id();

        Character::create($data);

        return redirect()->route('characters.index');
    }

    public function show($id)
    {
        $character = \App\Models\Character::findOrFail($id);

        if ($character->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action. You do not have permission to view this character.');
        }

        
        return view('characters.show', ['character' => $character]);
    }

    public function edit($id)
    {
        $character = Character::findOrFail($id);

        if ($character->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action. You do not have permission to view this character.');
        }

        return view('characters.edit', ['character' => $character]);
    }

    public function update(Request $request, $id)
    {
        $character = Character::findOrFail($id);

        if ($character->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action. You do not have permission to view this character.');
        }


        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'role'        => ['nullable', 'string'],
            'identity'    => ['nullable', 'string'],
            'background'  => ['nullable', 'string'],
            'development' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        $character->update($data);

        return redirect()->route('characters.index');
    }

    public function destroy($id)
    {
        $character = Character::findOrFail($id);

        if ($character->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action. You do not have permission to view this character.');
        }
        
        $character->delete();

        return redirect()->route('characters.index');
    }
}