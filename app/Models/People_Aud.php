<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class People_Aud extends Model
{
    use HasFactory;
    
    protected $connection = 'tenant';
    protected $table = 'people_aud';
    /**
     * Get the notes for the status.
     */
    protected $primaryKey = 'rev';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'birth_at', 'address', 'country', 'state', 'city', 'role', 'cep', 
        'is_verify', 'is_visitor', 'is_transferred',
        'is_responsible',
        'is_conversion',
        'is_baptism',
        'is_newvisitor',
        'note',
        'image',
        'lat',
        'lng',
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'is_active',
    ];
    protected $dates = [
        'updated_at',
    ];
}
