<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class People extends Model
{

    use HasFactory;

    protected $connection = 'tenant';
    protected $table = 'people';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'birth_at', 'address', 'country', 'state', 'city', 'role', 'cep', 
        'is_verify', 'is_visitor', 'is_transferred',
        'is_responsible',
        'is_conversion',
        'is_baptism',
        'is_newvisitor',
        'note',
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'is_active',
    ];

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
