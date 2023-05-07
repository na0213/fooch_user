<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;
use App\Models\Product;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    protected $fillable = [
        'owner_id',
        'product_id',
        'sort_num',
        'image',
       ];

    public function owner() {
    return $this->belongsTo(Owner::class);
    }

    public function product() {
    return $this->belongsTo(Product::class);
    }
}
