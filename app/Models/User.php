<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Product;
// use App\Models\ShippingAddress;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

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

    public function products()
    {
        return $this->belongsToMany(Product::class, 'carts') //第二引数：cart中間テーブル
        ->withPivot(['id', 'quantity']); //中間テーブルで必要な情報
    }
    // public function shipping_address()
    // {
    //     return $this->hasOne(ShippingAddress::class);
    // }
}