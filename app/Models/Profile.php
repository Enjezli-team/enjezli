<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'birth_date',
        'phone',
        'gander',
        'country',
        'facebook',
        'tweeter',
        'github',
        'major',
        'Job_title',
        'description',
        'user_id',
      
    ];
    
    public function sal_user(){

        return $this->belongsTo(User::class,'user_id');
    }
}
