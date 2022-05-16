<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'rate',
        'comment',
        'type',
        'type_id',
        'from_id',
        'to_id',
    ];
    public function sal_to_user(){

        return $this->belongsTo(User::class,'to_id');
    }
    public function sal_from_user(){

        return $this->belongsTo(User::class,'from_id');
    }
    public function sal_project(){

        return $this->belongsTo(Project::class,'type_id');
    }
}
