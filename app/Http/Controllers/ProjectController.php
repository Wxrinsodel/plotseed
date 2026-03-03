<?php

namespace App\Http\Controllers;

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
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => ['required', 'string'],
            'penname' => ['required', 'string'],
            'genre'   => ['required', 'string'],
            'outline' => ['nullable', 'string'],
        ]);

        $data['user_id'] = 1; 

        Project::create([
            'title'   => $data['title'],
            'penname' => $data['penname'],
            'genre'   => $data['genre'],
            'outline' => $data['outline'],
            'user_id' => $data['user_id'],
        ]);

        return redirect()->route('projects.index');
    }

    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show', ['project' => $project]);
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('projects.edit', ['project' => $project]);
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        $data = $request->validate([
            'title'   => ['required', 'string'],
            'penname' => ['required', 'string'],
            'genre'   => ['required', 'string'],
            'outline' => ['nullable', 'string'],
        ]);

        $project->update([
            'title'   => $data['title'],
            'penname' => $data['penname'],
            'genre'   => $data['genre'],
            'outline' => $data['outline'],
        ]);

        return redirect()->route('projects.index');
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
}