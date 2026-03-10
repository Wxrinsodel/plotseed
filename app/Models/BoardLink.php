<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardLink extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'source_note_id', 'target_note_id', 'label'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // start point is which note?
    public function sourceNote()
    {
        return $this->belongsTo(BoardNote::class, 'source_note_id');
    }

    // end point is which note?
    public function targetNote()
    {
        return $this->belongsTo(BoardNote::class, 'target_note_id');
    }
}