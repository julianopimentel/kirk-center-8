<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class EventConfirm extends Model
{
    use HasFactory;

    protected $connection = 'tenant';
    protected $table = 'events_confirm';
    
    protected $fillable = [
        'user_id',
        'event_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
