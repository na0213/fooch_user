<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Vendor\OwnerResetPassword as ResetPasswordNotification;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Store;
use App\Models\ProductImage;

class Owner extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function sendPasswordResetNotification($token){
    //     $this->notify(new ResetPasswordNotification($token));
    // }
    // public function owner()
    // {
    //     return $this->store()->owner();
    // }
    public function store()
    {
        return $this->hasOne(Store::class);
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
}
