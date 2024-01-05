<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Album extends Model
{
    use HasFactory;
    public function songs(){
        return $this->hasMany(Song::class);
    }
    
    public function FirstSongs(): HasOne
    {
        // return $this->hasOne(Song::class)->ofMany('',);
        return $this->songs()->one()->oldestOfMany();
    }
    public function artist(){
        return $this->belongsTo(Artist::class);
    }
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
