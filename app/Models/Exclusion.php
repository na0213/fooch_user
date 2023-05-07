<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Exclusion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function getExclusionNameAttribute() {
        return config('exclusion.'.$this->exclusion_id);
    }

    public function product() {
        return $this->belongsTo(Product::class)
        ->withPivot('exclusion_id','created_at','updated_at');
    }
}
