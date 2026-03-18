<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    public function characters()
    {
        
        return $this->belongsToMany(Character::class)->withPivot('is_main');

    }
    
    
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    
    public function coverUrl($conversion = 'preview'): string
    {

        $media = $this->getFirstMedia('covers');

        if ($media) {
            return $media->getUrl($conversion);
        }


        return asset('img/defaults/book_icon.jpg');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->width(400)
            ->height(600)
            ->fit(Fit::Crop, 400, 600)
            ->nonQueued();
    }
    
    public function sequences()
    {
        return $this->hasMany(\App\Models\Sequence::class)->orderBy('order_num', 'asc');
    }

    public function boardNotes()
    {
        return $this->hasMany(BoardNote::class);
    }

    public function boardLinks()
    {
        return $this->hasMany(BoardLink::class);
    }

}
