<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;


class Post extends Model
{
    use HasFactory;

    protected $connection = 'tenant';
    protected $table = 'posts';

    protected $fillable = [
        'body',
        'user_id',
        'image'
    ];

    public function getDescriptionAttribute()
    {
        return Str::limit($this->body, 200, '...');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
