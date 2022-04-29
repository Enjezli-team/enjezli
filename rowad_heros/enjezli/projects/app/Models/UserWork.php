<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file',
        'description',
        'link',
        'is_active',
        'user_id',
        
      
    ];
   
}
