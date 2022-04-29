<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'file',
        'skills',
        'duration',
        'price',
        'start_date',
        'end_date',
        'delivery_date',
        'status',
        'handled_by',
        'user_id',
       
    ];
}
