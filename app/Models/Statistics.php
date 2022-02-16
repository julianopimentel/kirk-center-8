<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Statistics extends Model
{
    use HasFactory;
    protected $connection = 'tenant';
    protected $table = 'statistics';
    /**
     * Get the notes for the status.
     */
}
