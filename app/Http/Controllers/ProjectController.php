<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Project;
use App\Models\Sequence;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('projects.index', ['projects' => $projects]);
    }

    public function create()
    {
         $characters = \App\Models\Character::where('user_id', auth()->id())->orderBy('name')->get();
        return view('projects.create', ['characters' => $characters]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'      => ['required', 'string'],
            'penname'    => ['required', 'string'],
            'genre'      => ['required', 'string'],
            'outline'    => ['nullable', 'string'],
            'characters' => ['nullable', 'array'],
            'book_link' => 'nullable|url|max:255',

        ], [
            'title.required'   => 'you need to fill in the title name',
            'penname.required' => 'you need to fill in your penname',
            'genre.required'   => 'you need to choose your genre',
        ]);

        $data['user_id'] = auth()->id();

        $project = Project::create($data);

        $project->characters()->sync($data['characters'] ?? []);

        if ($request->hasFile('cover_image')) {
            $project->addMediaFromRequest('cover_image')->toMediaCollection('covers');
        }

        return redirect()->route('projects.index');
    }

    public function show($id)
    {
        $project = Project::find($id);

        if ($project->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action. You do not have permission to edit this project.');
        }
        return view('projects.show', ['project' => $project]);
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);

        if ($project->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action. You do not have permission to edit this project.');
        }

         $characters = \App\Models\Character::where('user_id', auth()->id())->orderBy('name')->get();
        return view('projects.edit', ['project' => $project, 'characters' => $characters]);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        if ($project->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action. You do not have permission to edit this project.');
        }

        $data = $request->validate([
            'title'      => ['required', 'string'],
            'penname'    => ['required', 'string'],
            'genre'      => ['required', 'string'],
            'outline'    => ['nullable', 'string'],
            'characters' => ['nullable', 'array'],
            'book_link' => 'nullable|url|max:255',
        ], [

            'title.required'   => 'you need to fill in the title name',
            'penname.required' => 'you need to fill in your penname',
            'genre.required'   => 'you need to choose your genre',
        ]);
        $project->update($data);

        $project->characters()->sync($data['characters'] ?? []);

        
        if ($request->hasFile('cover_image')) {
            $project->clearMediaCollection('covers'); 
            $project->addMediaFromRequest('cover_image')->toMediaCollection('covers');
        }

        return redirect()->route('projects.show', $project->id);
    }

    public function destroy($id)
    {
        $project = \App\Models\Project::find($id);

        if ($project->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action. You do not have permission to edit this project.');
        }

        $project->delete();

        return redirect()->route('projects.index');
    }

    public function sequence($id)
    {
        $project = \App\Models\Project::findOrFail($id);

        if ($project->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action. You do not have permission to edit this project.');
        }
        
        return view('projects.sequence', ['project' => $project]);
    }

    public function board($id)
    {
        $project = \App\Models\Project::findOrFail($id);

        if ($project->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action. You do not have permission to edit this project.');
        }
        
        return view('projects.board', ['project' => $project]);
    }


    public function manageCharacters($id)
    {
        $project = Project::findOrFail($id);

        if ($project->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action. You do not have permission to edit this project.');
        }

         $characters = \App\Models\Character::where('user_id', auth()->id())->orderBy('name')->get();
        
        return view('projects.manage-characters', [
            'project' => $project, 
            'characters' => $characters
        ]);
    }

    
    public function updateCharacters(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        if ($project->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action. You do not have permission to edit this project.');
        }

        $data = $request->validate([
            'characters' => ['nullable', 'array'],
        ]);

        
        $project->characters()->sync($data['characters'] ?? []);

    
        return redirect()->route('projects.show', $project->id);
    }
    
    public function storeSequence(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            'chapter_no' => 'required|string',
            'title'      => 'required|string',
            'description'=> 'nullable|string',
        ], [
            'chapter_no.required' => 'Please enter Chapter No. (e.g., Chapter 1)',
            'title.required'      => 'Please enter the event title',
        ]);

        // สร้าง Sequence ใหม่ผูกกับ Project นี้
        $project->sequences()->create($data);

        return redirect()->route('projects.sequence', $project->id);
    }

    // ฟังก์ชันสำหรับลบเหตุการณ์
    public function destroySequence($id, $sequenceId)
    {
        $sequence = Sequence::where('project_id', $id)->findOrFail($sequenceId);
        $sequence->delete();

        return redirect()->back()->with('success', 'Event deleted successfully');
    }

    // ฟังก์ชันสำหรับหน้าแก้ไข (แบบง่าย)
    public function editSequence($id, $sequenceId)
    {
        $project = Project::findOrFail($id);
        $sequence = Sequence::where('project_id', $id)->findOrFail($sequenceId);
        
        return view('projects.edit-sequence', compact('project', 'sequence'));
    }

    // ฟังก์ชันสำหรับบันทึกการแก้ไข
    public function updateSequence(Request $request, $id, $sequenceId)
    {
        $sequence = Sequence::where('project_id', $id)->findOrFail($sequenceId);

        $data = $request->validate([
            'chapter_no' => 'required|string',
            'title'      => 'required|string',
            'description'=> 'nullable|string',
        ]);

        $sequence->update($data);

        return redirect()->route('projects.sequence', $id)->with('success', 'Event updated!');
    }

}