<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;
use App\Models\Product;
use App\Models\SpecificBusinessTransaction;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'owner_id', 
        'name',
        'info',
        'logo',
        'image',
        'status',
        'fee_percentage',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
    public function specificBusinessTransaction()
    {
        return $this->hasOne(SpecificBusinessTransaction::class);
    }

    //店舗申請履歴
    public function storeApplicationHistories()
    {
        return $this->hasMany(StoreApplicationHistory::class);
    }

    public function shippingPatterns()
    {
        return $this->hasMany(ShippingPattern::class);
    }
    
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
