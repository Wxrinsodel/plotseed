<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardNote extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'content', 'color', 'pos_x', 'pos_y'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // links that start from this note
    public function sentLinks()
    {
        return $this->hasMany(BoardLink::class, 'source_note_id');
    }

    // links that end at this note
    public function receivedLinks()
    {
        return $this->hasMany(BoardLink::class, 'target_note_id');
    }
}