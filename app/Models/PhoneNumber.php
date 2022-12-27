<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhoneNumber extends Model
{
    protected $fillable = [
        'phone_number'
    ];

    protected $primaryKey = [
        'customer_id',
        'phone_number'
    ];

    public $incrementing = false;

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    use HasFactory;
}
