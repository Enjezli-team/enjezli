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
    public function sal_offers(){

        return $this->hasMany(Offer::class,'project_id')->where('status','<>','0')
        ->where('status','<>','4');//canceled
    }
    //users
    public function sal_handel_by(){
        return $this->belongsTo(User::class,'handled_by');
    }
    public function sal_created_by(){

        return $this->belongsTo(User::class,'user_id');
    }
    //skills
    public function sal_skills_by(){

        return $this->hasMany(ProjectSkill::class,'project_id');
    }
     //attachement
     public function sal_project_attach(){
        return $this->hasMany(UserAttachment::class,'attach_id')->where('attach_type',1);
    }
    //review
    public function sal_review(){

        return $this->hasOne(Review::class,'type_id');
    }
}
