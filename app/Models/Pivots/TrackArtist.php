<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TrackArtist extends Pivot
{
    protected $table = 'track_artists';

    use HasFactory;
}
