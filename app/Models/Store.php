<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;
use App\Models\Product;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id', 
        'name',
        'email',
        'zipcode',
        'prefecture',
        'city',
        'tel',
        'info',
        'logo',
        'image',
        'status',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
