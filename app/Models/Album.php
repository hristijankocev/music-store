<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Album extends Model
{
    use HasFactory;

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }

    public function item(): MorphOne
    {
        return $this->morphOne(Item::class, 'itemable');
    }
}
