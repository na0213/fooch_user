<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\OrderHistory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    // primaryKeyのカラム名を入れる
    protected $primaryKey = 'id';
    // uuidなのでインクリメントはしないようにする(デフォルトはtrue)
    public $incrementing = false;
    // primary keyの型をuuidに合わせる(デフォルトはint)
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'store_id',
        'product_id',
        'user_id',
        'quantity',
        'price',
        'total_price',
        'shipping_fee',
        'order_status',
        'shipping_name',
        'shipping_zipcode',
        'shipping_prefecture',
        'shipping_city',
        'shipping_tel',
        'created_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected static function boot()
    {
        parent::boot();
        // レコード作成時にprimary keyに自動的にuuidを入れてくれるようにする
        static::creating(function ($model) {
            $model->id = (string) \Illuminate\Support\Str::orderedUuid();
        });
    }
    public function orderHistories()
    {
        return $this->hasMany(OrderHistory::class);
    }
}
