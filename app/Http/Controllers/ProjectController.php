<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = [
            'Lovely project',
            'Dragon project',
            'Awesome project',
        ];

        return view('projects.index', ['projects' => $projects]);
    }

    public function show($project)
    {
        return view('projects.show', ['project' => $project]);
    }
}