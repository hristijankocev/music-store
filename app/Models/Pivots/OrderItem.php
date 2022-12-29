<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderItem extends Pivot
{
    protected $primaryKey = [
        'order_id',
        'item_id'
    ];

    protected $table = 'order_item';

    use HasFactory;
}
