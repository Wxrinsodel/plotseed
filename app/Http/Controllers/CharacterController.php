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
            'role'        => ['required', 'string'],
            'identity'    => ['nullable', 'string'],
            'background'  => ['nullable', 'string'],
            'development' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
        ], [
            'name.required' => 'you need to fill in the character name',
            'role.required' => 'you need to choose a role',
        ]);

        $data['user_id'] = auth()->id();

        $character = Character::create($data);

        if ($request->hasFile('avatar')) {
            $character->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

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
            'role'        => ['required', 'string'],
            'identity'    => ['nullable', 'string'],
            'background'  => ['nullable', 'string'],
            'development' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
        ], [
            'name.required' => 'you need to fill in the character name',
            'role.required' => 'you need to choose a role',
        ]);

        $character->update($data);

        if ($request->hasFile('avatar')) {
            $character->clearMediaCollection('avatars'); 
            $character->addMediaFromRequest('avatar')->toMediaCollection('avatars');
            }

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