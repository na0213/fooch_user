<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Product;
use App\Models\ShippingAddress;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'name_pronunciation',
        'tel',
        'gender',
        'email',
        'email_verified',
        'email_verify_token',
        'zipcode',
        'prefecture',
        'city',
        'birth_year',
        'birth_month',
        'birth_day',
        'password',
        'stripe_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'carts') //第二引数：cart中間テーブル
        ->withPivot(['id', 'quantity']); //中間テーブルで必要な情報
    }
    public function shipping_address()
    {
        return $this->hasOne(ShippingAddress::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'favorites');
    }
}