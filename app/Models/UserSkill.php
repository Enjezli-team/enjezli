<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'skill_id',
        
    ];
    public function sal_user(){

        return $this->belongsTo(Project::class,'user_id');
    }
    public function sal_skill_u(){
        return $this->belongsTo(Skill::class,'skill_id');
    }
  
}
