<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Character extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function projects()
    {
        return $this->belongsToMany(\App\Models\Project::class);
    }

    public function avatarUrl($conversion = 'preview'): string
    {

        $media = $this->getFirstMedia('avatars');

        if ($media) {
           return $media->getUrl($conversion);
        }
    
        return asset('img/defaults/Profile_icon.jpg');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->width(400)
            ->height(400)
            ->fit(Fit::Crop, 400, 400)
            ->nonQueued();
    }
}