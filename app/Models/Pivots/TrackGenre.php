<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TrackGenre extends Pivot
{
    protected $table = 'track_genres';

    use HasFactory;
}
