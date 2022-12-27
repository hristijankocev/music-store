<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_address',
        'date_birth',
    ];

    protected $casts = [
        'date_birth' => 'datetime',
    ];

    public function profile(): MorphOne
    {
        return $this->morphOne('App\User', 'profileable');
    }
}
