<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    protected $table = 'admin.example';

    /**
     * Get the Status that owns the Notes.
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }
}
