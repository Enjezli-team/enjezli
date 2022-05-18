<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'duration',
        'description',
        'status',
        'provider_id',
        'project_id',
        'github',
        'major',
        'Job_title',
        'description',
    ];

    //provider
    public function sal_provider_by()
    {

        return $this->belongsTo(User::class, 'provider_id');
    }
    //project
    public function sal_project_id()
    {

        return $this->belongsTo(Project::class, 'project_id');
    }
    //attachement
    public function sal_offer_attach()
    {
        return $this->hasMany(UserAttachment::class, 'attach_id')->where('attach_type', 2);
    }
    public function sal_complain()
    {
        return $this->hasOne(Complain::class, 'offer_id');
    }
}
