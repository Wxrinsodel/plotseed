<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'penname', 'genre', 'outline', 'user_id'];

    public function characters()
    {
        
        return $this->belongsToMany(Character::class);
    }
    //
}
