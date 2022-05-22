<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chatProblem extends Model
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
        'receiver_id1',
        'receiver_id2',
    ];

    public function receiver_chat()
    {

        return $this->belongsTo(User::class, 'receiver_id1','id');
    }
    public function receiver_chat2()
    {

        return $this->belongsTo(User::class, 'receiver_id2','id');
    }
    public function sender_chat()
    {

        return $this->belongsTo(User::class, 'sender_id','id');
    }
}
