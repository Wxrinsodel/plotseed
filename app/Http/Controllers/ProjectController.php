<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'desc')->get(); 
        
        return view('projects.index', ['projects' => $projects]);
    }

    public function create()
    {
        $characters = \App\Models\Character::orderBy('name')->get();
        return view('projects.create', ['characters' => $characters]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'      => ['required', 'string'],
            'penname'    => ['required', 'string'],
            'genre'      => ['required', 'string'],
            'sub_genre'  => ['nullable', 'string'],
            'outline'    => ['nullable', 'string'],
            'characters' => ['nullable', 'array'],
        ]);

        $data['user_id'] = auth()->id();

        $project = Project::create($data);

        $project->characters()->sync($data['characters'] ?? []);

        return redirect()->route('projects.index');
    }

    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show', ['project' => $project]);
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $characters = \App\Models\Character::orderBy('name')->get();
        return view('projects.edit', ['project' => $project, 'characters' => $characters]);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            'title'      => ['required', 'string'],
            'penname'    => ['required', 'string'],
            'genre'      => ['required', 'string'],
            'sub_genre'  => ['nullable', 'string'],
            'outline'    => ['nullable', 'string'],
            'characters' => ['nullable', 'array'],
        ]);

        $project->update($data);

        $project->characters()->sync($data['characters'] ?? []);

        return redirect()->route('projects.show', $project->id);
    }

    public function destroy($id)
    {
        $project = \App\Models\Project::find($id);

        $project->delete();

        return redirect()->route('projects.index');
    }

    public function sequence($id)
    {
        $project = \App\Models\Project::findOrFail($id);
        return view('projects.sequence', ['project' => $project]);
    }

    public function board($id)
    {
        $project = \App\Models\Project::findOrFail($id);
        return view('projects.board', ['project' => $project]);
    }


    public function manageCharacters($id)
    {
        $project = Project::findOrFail($id);
        $characters = \App\Models\Character::orderBy('name')->get();
        
        return view('projects.manage-characters', [
            'project' => $project, 
            'characters' => $characters
        ]);
    }

    
    public function updateCharacters(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            'characters' => ['nullable', 'array'],
        ]);

        
        $project->characters()->sync($data['characters'] ?? []);

    
        return redirect()->route('projects.show', $project->id);
    }
}