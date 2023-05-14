<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Store;

class SpecificBusinessTransaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'store_id', 
        'business_name', 
        'representative_name',
        'zipcode',
        'prefecture',
        'city',
        'tel',
        'contact',
        'business_days',
        'sale_price',
        'shipping_cost',
        'delivery',
        'payment_method',
        'payment_timing',
        'return_exchange'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
