<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get(); 
        return view('projects.index', compact('projects'));
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

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

}