<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use App\Models\User;

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
        return $this->morphOne(User::class, 'profileable');
    }

    public function phones(): HasMany
    {
        return $this->hasMany(PhoneNumber::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
