<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword, Wallet
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;
    use HasWallet;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'image',
        'status',
        'email',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function user_roles_user()
    {

        return $this->hasMany(RoleUser::class, 'user_id');
    }

    //profile
    public function sal_profile()
    {

        return $this->hasOne(Profile::class, 'user_id');
    }
    //projects
    public function sal_projects_seeker()
    {

        return $this->hasMany(Project::class, 'user_id');
    }
    //projects
    public function sal_review_to()
    {

        return $this->hasMany(Review::class, 'to_id');
    }
    public function sal_review_from()
    {

        return $this->hasMany(Review::class, 'from_id');
    }
    public function sal_projects_provider()
    {

        return $this->hasMany(Project::class, 'handled_by');
    }
    //offers
    public function sal_offers()
    {

        return $this->hasMany(Offer::class, 'provider_id');
    }

    public function sal_offers_history()
    {

        return $this->hasMany(Offer::class, 'user_id');
    }
    //skills
    public function sal_skills()
    {

        return $this->hasMany(UserSkill::class, 'user_id');
    }
    //works
    public function sal_works()
    {

        return $this->hasMany(UserWork::class, 'user_id')->where('is_active', 1);
    }
    //attachement
    public function sal_attachments()
    {

        return $this->hasMany(UserAttachment::class, 'user_id');
    }
    //notification
    public function sal_notification_for_me()
    {

        return $this->hasMany(Notification::class, 'receiver_id');
    }
    public function sal_notification_from()
    {

        return $this->hasMany(Notification::class, 'sender_id');
    }
    public function roles()
    {
        return $this
            ->belongsToMany(Role::class);
    }
    
    public function getImageAttribute($value)
    {

        return url('images/') . '/' . $value;
    }
}
