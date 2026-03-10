<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\BoardNote;
use App\Models\BoardLink;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(Project $project)
    {
        $notes = $project->boardNotes;
        $links = $project->boardLinks;

        return view('projects.board', compact('project', 'notes', 'links')); 
    }


    public function storeNote(Request $request, Project $project)
    {
        $validated = $request->validate([
            'content' => 'nullable|string',
            'color' => 'nullable|string',
            'pos_x' => 'numeric',
            'pos_y' => 'numeric',
        ]);

        $note = $project->boardNotes()->create([
            'content' => $validated['content'] ?? '',
            'color' => $validated['color'] ?? 'bg-yellow-100',
            'pos_x' => $validated['pos_x'] ?? 50,
            'pos_y' => $validated['pos_y'] ?? 50,
        ]);

        // ส่งกลับข้อมูลโพสต์อิตใหม่ในรูปแบบ JSON เพื่อให้ JavaScript สามารถเพิ่มลงในกระดานได้ทันที
        return response()->json(['success' => true, 'note' => $note]);
    }

    
    public function updateNotePosition(Request $request, Project $project, BoardNote $boardNote)
    {
        $validated = $request->validate([
            'pos_x' => 'required|numeric',
            'pos_y' => 'required|numeric',
        ]);

        $boardNote->update([
            'pos_x' => $validated['pos_x'],
            'pos_y' => $validated['pos_y'],
        ]);

        return response()->json(['success' => true]);
    }


    public function updateNoteContent(Request $request, Project $project, BoardNote $boardNote)
    {
        $validated = $request->validate([
            'content' => 'nullable|string',
        ]);

        $boardNote->update([
            'content' => $validated['content'],
        ]);

        return response()->json(['success' => true]);
    }


    public function destroyNote(Project $project, BoardNote $boardNote)
    {
        $boardNote->delete();
        return response()->json(['success' => true]);
    }


    public function storeLink(Request $request, Project $project)
    {
        $validated = $request->validate([
            'source_note_id' => 'required|exists:board_notes,id',
            'target_note_id' => 'required|exists:board_notes,id',
            'label' => 'nullable|string',
        ]);

        $link = $project->boardLinks()->create($validated);

        return response()->json(['success' => true, 'link' => $link]);
    }


    public function updateLinkLabel(Request $request, Project $project, BoardLink $boardLink)
    {
        $validated = $request->validate([
            'label' => 'nullable|string|max:255',
        ]);

        $boardLink->update([
            'label' => $validated['label'],
        ]);

        return response()->json(['success' => true]);
    }

    
    public function destroyLink(Project $project, BoardLink $boardLink)
    {
        $boardLink->delete();
        return response()->json(['success' => true]);
    }
}