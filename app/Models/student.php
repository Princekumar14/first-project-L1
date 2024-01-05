<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucwords($value),      // Accessor
            set: fn (string $value) => strtolower($value),   // Mutator
        );
    }
}
