<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get(); 
        return view('projects.index', ['projects' => $projects]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'penname' => 'required',
            'genre' => 'required',
            'outline' => 'nullable',
        ]);

        $validated['user_id'] = 1; 

        Project::create($validated);

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
        
        $data = $request->all();

        $project->update([
            'title'   => $data['title'],
            'penname' => $data['penname'],
            'genre'   => $data['genre'],
            'outline' => $data['outline'],
        ]);

        return redirect()->route('projects.show', $project->id);
    }
}