<?php

namespace App\Models;

use App\Casts\Duration;
use App\Models\Pivots\TrackArtist;
use App\Models\Pivots\TrackGenre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'length',
        'album_id'
    ];

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'track_genres')
            ->using(TrackGenre::class);
    }

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class, 'track_artists')
            ->using(TrackArtist::class);
    }

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function item(): MorphOne
    {
        return $this->morphOne(Item::class, 'itemable');
    }

    protected $casts = [
        'length' => Duration::class
    ];
}
