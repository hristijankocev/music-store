<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Item extends Model
{
    use HasFactory;

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    protected $with = [
        'itemable',
    ];

    public function itemable(): MorphTo
    {
        return $this->morphTo();
    }
}
