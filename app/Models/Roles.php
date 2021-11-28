<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class Roles extends Model
{

    use HasFactory;
    use Notifiable;

    protected $connection = 'tenant';
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'add_people',
        'edit_people',
        'view_people',
        'delete_people', 
        'edit_precadastro', 
        'view_precadastro', 
        'add_group',
        'add_group_people',
        'edit_group',
        'view_group',
        'delete_group',
        'delete_group_group',
        'add_message',
        'edit_message',
        'view_message',
        'delete_message',
        'add_entrada_financial',
        'add_retirada_financial',
        'edit_financial',
        'view_financial',
        'delete_financial',
        'add_calendar',
        'edit_calendar',
        'view_calendar',
        'delete_calendar',
        'home_financeiro',
        'home_financeiro_valores',
        'home_grupo',
        'home_social',
        'home_message',
        'view_periodo',
        'view_dash',
        'view_detail',
        'view_resumo_financeiro',
        'settings_general',
        'settings_email',
        'settings_meta',
        'settings_social',
        'settings_roles'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $dates = [
        'deleted_at'
    ];
}
