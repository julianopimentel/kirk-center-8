<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class Config_social extends Model
{

    use HasFactory;
    use Notifiable;

    protected $connection = 'tenant';
    protected $table ='config_social';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'facebook_link', 'twitter_link', 'google_link', 'youtube_link', 
        'linkedin_link', 'instagram_link', 'vk_link', 'site_link', 'whatsapp_link','telegram_link',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'update_at' => 'datetime',
    ];

}
