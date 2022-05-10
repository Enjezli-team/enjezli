<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'parent_id',
'status'
    ];
    //user
    public function sal_skill_for_user(){

        return $this->hasMany(UserSkill::class,'skill_id');
    }
    //project
    public function sal_skill_for_project(){

        return $this->hasMany(ProjectSkill::class,'skill_id');
    }

     //skills
     public function parent() {
        return $this->belongsTo(Skill::class, 'parent_id');
    }

    public function childs() {
        return $this->hasMany(Skill::class, 'parent_id');
    }
}
