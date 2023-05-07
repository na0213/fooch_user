<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingPattern extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'shipping_name',
        'hokkaido_fee',
        'ktohoku_fee',
        'mtohoku_fee',
        'kanto_fee',
        'shinetsu_fee',
        'hokuriku_fee',
        'tyubu_fee',
        'kansai_fee',
        'tyugoku_fee',
        'shikoku_fee',
        'kyushu_fee',
        'okinawa_fee',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function product() 
    {
        return $this->hasMany(Product::class);
    }
    
    public function calculateShippingFee($prefecture)
    {
        switch ($prefecture) {
            case '北海道':
                return $this->hokkaido_fee;
            case '青森県':
            case '岩手県':
            case '秋田県':
                return $this->ktohoku_fee;
            case '宮城県':
            case '山形県':
            case '福島県':
                return $this->mtohoku_fee;
            case '群馬県':
            case '茨城県':
            case '栃木県':
            case '埼玉県':
            case '千葉県':
            case '東京都':
            case '神奈川県':
            case '山梨県':
                return $this->kanto_fee;
            case '新潟県':
            case '長野県':
                return $this->shinetsu_fee;
            case '富山県':
            case '石川県':
            case '福井県':
                return $this->hokuriku_fee;
            case '岐阜県':
            case '静岡県':
            case '愛知県':
            case '三重県':
                return $this->tyubu_fee;
            case '滋賀県':
            case '京都府':
            case '大阪府':
            case '兵庫県':
            case '奈良県':
            case '和歌山県':
                return $this->kansai_fee;
            case '鳥取県':
            case '島根県':
            case '岡山県':
            case '広島県':
            case '山口県':
                return $this->tyugoku_fee;
            case '徳島県':
            case '香川県':
            case '愛媛県':
            case '高知県':
                return $this->shikoku_fee;
            case '福岡県':
            case '佐賀県':
            case '長崎県':
            case '熊本県':
            case '大分県':
            case '宮崎県':
            case '宮崎県':
                return $this->kyushu_fee;
            case '沖縄県':
                return $this->okinawa_fee;
            default:
                return 0;
        }
    }
}
