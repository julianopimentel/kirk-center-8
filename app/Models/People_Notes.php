<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People_Notes extends Model
{
    use HasFactory;
    protected $connection = 'tenant';
    protected $table = 'people_notes';

    protected $fillable = [
        'user_id', 'notes', 'people_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $dates = [
        'deleted_at'
    ];
}
