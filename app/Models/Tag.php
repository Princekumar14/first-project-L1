<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;

    public function albums(): MorphToMany
    {
        return $this->morphedByMany(Album::class, 'taggable');
    }
    public function songs(): MorphToMany
    {
        return $this->morphedByMany(Song::class, 'taggable');
    }
}
