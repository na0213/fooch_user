<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use App\Models\Exclusion;
use App\Models\Stock;
use App\Models\User;
use App\Models\ProductImage;
use App\Models\Photo;
use App\Models\ShippingPattern;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'category_id',
        'shipping_patterns_id',
        'name',
        'content_volume',
        'ingredients',
        'storage_method',
        'price',
        'expiration',
        'additives',
        'allergy',
        'origin',
        'nutrition_facts',
        'info',
        'max_purchase_quantity',
        'status',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function getCategoryNameAttribute()
    {
        return config('category.'.$this->category_id);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getPriceWithTaxAttribute()
    {
        $tax_rate = config('tax.rate');
        $price_with_tax = $this->attributes['price'] * (1 + $tax_rate);
        return round($price_with_tax); // 小数点以下の桁数を指定せずに四捨五入
    }    

    public function shipping_pattern() 
    {
        return $this->belongsTo(ShippingPattern::class, 'shipping_patterns_id');
    }

    public function getExclusionNameAttribute()
    {
        return config('exclusion.'.$this->exclusion_id);
    }

    public function exclusions() {
        return $this->belongsToMany(Exclusion::class)
        ->withPivot('exclusion_id','created_at','updated_at');
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    public function getStockQuantity()
    {
        return $this->stock->sum('quantity');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'carts')
        ->withPivot(['id', 'quantity']);
    }

    public function orders()
    {
        return $this->belongsToMany(User::class, 'orders', 'user_id', 'product_id');
    }

    public function scopeAvailableItems($query, $exclusionId)
    {
        $stocks = DB::table('stocks')
        ->select('product_id',
        DB::raw('sum(quantity) as quantity'))
        ->groupBy('product_id')
        ->where('quantity', '>', 1);

        $exclusions = DB::table('exclusion_product')
        ->where(function($q) use($exclusionId){
            if($exclusionId == '')
            {
                $q->where('exclusion_id', '=', 0);
            }
            elseif($exclusionId <= 1)
            {
                $q->where('exclusion_id', '<>', intval($exclusionId));
            } else
            {
                foreach($exclusionId as $item){
                    $q->orWhere('exclusion_id', '=', intval($item));
                }
            }
        })
        ->select('product_id')
        ->distinct('product_id');

        return $query
        ->leftJoinSub($exclusions, 'exclusion', function($join){
            $join->on('products.id', '=', 'exclusion.product_id');
        })
        ->where(function($q){
            $q->whereNull('exclusion.product_id')
            ->orWhere('exclusion.product_id', '!=', DB::raw('products.id'));
        })
        ->joinSub($stocks, 'stock', function($join){
            $join->on('products.id', '=', 'stock.product_id');
        })
        ->join('product_images', 'products.id', '=', 'product_images.product_id')
        ->where('product_images.sort_num', '0')
        ->leftJoin('shipping_patterns', 'products.shipping_patterns_id', '=', 'shipping_patterns.id')
        ->join('stores as product_stores', 'products.store_id', '=', 'product_stores.id')
        ->where('products.status', 'using')
        ->select('products.id as id',
        'products.name as name',
        'products.price as price',
        'products.info as info',
        'products.category_id as category_id',
        'product_images.image as image',
        'products.ingredients',
        'products.additives',
        'products.expiration',
        'products.allergy',
        'products.max_purchase_quantity',
        'product_stores.name as store_name',
        );
    }

    public function scopeSortOrder($query, $sortOrder)
    {
        // if($sortOrder === null || $sortOrder === \Constant::SORT_ORDER['recommend']){
        //     return $query->orderBy('sort_order', 'asc');
        // }
        if($sortOrder === \Constant::SORT_ORDER['higherPrice']){
            return $query->orderBy('price', 'desc');
        }
        if($sortOrder === \Constant::SORT_ORDER['lowerPrice']){
            return $query->orderBy('price', 'asc');
        }
        if($sortOrder === \Constant::SORT_ORDER['later']){
            return $query->orderBy('products.created_at', 'desc');
        }
        if($sortOrder === \Constant::SORT_ORDER['older']){
            return $query->orderBy('products.created_at', 'asc');
        }
    }

    public function scopeSelectCategory($query, $categoryId)
    {
        if($categoryId !== '0')
        {
            return $query->where('category_id',$categoryId);
        } else {
            return ;
        }
    }

    public function scopeSearchKeyword($query, $keyword)
    {
        if(!is_null($keyword))
        {
            $spaceConvert = mb_convert_kana($keyword,'s');
            $keywords = preg_split('/[\s]+/', $spaceConvert,-1,PREG_SPLIT_NO_EMPTY);
            foreach($keywords as $word)
            {
                $query->Where('products.name','like','%'.$word.'%');
            }
            return $query;

        } else {
            return;
        }
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function isFavoriteBy(User $user): bool
    {
        return $this->favorites()->where('user_id', $user->id)->exists();
    }

}
