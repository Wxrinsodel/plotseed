<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    public function characters()
    {
        
        return $this->belongsToMany(Character::class);
    }
    
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    //
}
