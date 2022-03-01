<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account_Integrador extends Model
{
    use HasFactory;
    protected $table = 'admin.integrador';
    public $timestamps = false;
    /**
     * Get the notes for the status.
     */
    
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }
    public function getUser()
    {
        return $this->belongsTo('App\Models\User', 'user_integrador');
    }
}
