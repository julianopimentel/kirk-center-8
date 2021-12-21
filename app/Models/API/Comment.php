<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\API\User;

class Comment extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';

    protected $fillable = [
        'comment',
        'user_id',
        'post_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
