<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;


    public function sal_offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }
    
}
