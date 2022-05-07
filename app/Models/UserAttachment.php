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

   //prroject 
    public function sal_proj_attach(){

        return $this->belongsTo(Project::class,'attach_id')->where('attach_type',1);
    }
     //works 
     public function sal_work_attach(){

        return $this->belongsTo(UserWork::class,'attach_id')->where('attach_type',2);
    }

   //offer 
   public function sal_offer_attach(){

    return $this->belongsTo(Offer::class,'attach_id')->where('attach_type',3);
}
//user
public function sal_user_attach(){

    return $this->belongsTo(User::class,'user_id');
}

public function getFileNameAttribute($value){

    return url('images/').'/'.$value;
}

}
