<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';

    protected $fillable = [
        'user_id',
        'post_id'
    ];
}
