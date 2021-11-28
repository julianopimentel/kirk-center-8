<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status_log extends Model
{
    use HasFactory;

    protected $table = 'admin.activity_status';
    public $timestamps = false; 
    /**
     * Get the notes for the status.
     */
}
