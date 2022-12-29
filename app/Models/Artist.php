<?php

namespace App\Models;

use App\Models\Pivots\TrackArtist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Artist extends Model
{
    use HasFactory;

    public function tracks(): BelongsToMany
    {
        return $this->belongsToMany(Track::class, 'track_artists')
            ->using(TrackArtist::class);
    }
}
