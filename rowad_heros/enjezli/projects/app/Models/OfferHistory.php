<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'duration',
        'description',
        'status',
        'provider_id',
        'project_id',
        'github',
        'major',
        'Job_title',
        'description',
        'user_id',
      
    ];
}
