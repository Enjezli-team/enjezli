<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAttachment extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_name',
        'file_type',
        'attach_type',
        'is_active',
        'attach_id',
        'user_id',
        
      
    ];

   
}
