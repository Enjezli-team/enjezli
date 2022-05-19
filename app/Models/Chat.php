<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'message',
        'is_read',
        'type',
        'type_id',
        'sender_id',
        'receiver_id',
    ];

    public function receiver_chat()
    {

        return $this->belongsTo(User::class, 'receiver_id','id');
    }
    public function sender_chat()
    {

        return $this->belongsTo(User::class, 'sender_id','id');
    }
}
