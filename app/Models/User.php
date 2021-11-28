<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Overtrue\LaravelLike\Traits\Liker;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Qirolab\Laravel\Reactions\Contracts\ReactsInterface;
use Qirolab\Laravel\Reactions\Traits\Reacts;

class User extends Authenticatable implements ReactsInterface
{
    use Liker;
    use Reacts;
    use Notifiable;
    use SoftDeletes;
    use HasRoles;
    use HasFactory;

    
    protected $table = 'admin.users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'license', 'mobile', 'image', 'profile_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'deleted_at', 'expire',
    ];

    protected $attributes = [ 
        'menuroles' => 'user',
    ];
    public function getImageAttribute()
    {
       return $this->profile_image;
    }
    public function isAdmin() {
        return $this->master  === true;
    }
}
