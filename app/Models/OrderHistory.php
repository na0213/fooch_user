<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class OrderHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'order_id',
        'status',
        'created_at'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
