<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'rate',
        'comment',
        'type',
        'type_id',
        'from_id',
        'to_id',
    ];

    
}