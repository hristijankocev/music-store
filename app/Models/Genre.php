<?php

namespace App\Models;

use App\Models\Pivots\TrackGenre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    use HasFactory;

    public function tracks(): BelongsToMany
    {
        return $this->belongsToMany(Track::class, table: 'track_genres')->using(TrackGenre::class);
    }
}
