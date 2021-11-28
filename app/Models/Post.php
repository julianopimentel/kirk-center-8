<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Qirolab\Laravel\Reactions\Contracts\ReactableInterface;
use Qirolab\Laravel\Reactions\Traits\Reactable;
use Overtrue\LaravelLike\Traits\Likeable;


class Post extends Model
{
    use HasFactory;

    protected $connection = 'adminaccount';

    
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
