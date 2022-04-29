<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'message',
        'is_read',
        'sender_id',
        'receiver_id',
       
        
    ];
    
}
