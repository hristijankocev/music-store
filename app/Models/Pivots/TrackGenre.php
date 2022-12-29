<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TrackGenre extends Pivot
{
    protected $primaryKey = [
        'track_id',
        'genre_id'
    ];

    protected $table = 'track_genres';

    use HasFactory;
}
