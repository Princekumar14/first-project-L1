<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;
    // public function albums():HasMany
    // {
    //     return $this->hasMany(Album::class);
    // }
    public function SingleAlbum()
    {
        return $this->hasOne(Album::class);
    }
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
