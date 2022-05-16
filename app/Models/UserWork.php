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
   //attachement
 public function sal_work_attach(){
    return $this->hasMany(UserAttachment::class,'attach_id')->where('attach_type',3);
}
//user
public function sal_user(){

    return $this->belongsTo(User::class,'user_id')->where('is_active',1);
}
}
