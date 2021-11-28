<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class Config_email extends Model
{

    use HasFactory;
    use Notifiable;

    protected $connection = 'tenant';
    protected $table ='config_email';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email_from', 'smtp_host', 'smtp_port', 'smtp_user', 
        'smtp_pass', 'smtp_security', 'vk_link', 'site_link', 'whatsapp_link','telegram_link'
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
