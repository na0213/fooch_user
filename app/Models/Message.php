<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Conversation;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'conversation_id',
        'user_id', 'store_id',
        'message'
    ];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}
