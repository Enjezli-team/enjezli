<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSkill extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'skill_id',
        
    ];
    public function sal_project(){

        return $this->belongsTo(Project::class,'project_id');
    }
    public function sal_skill(){
        return $this->belongsTo(Skill::class,'skill_id');
    }
}
