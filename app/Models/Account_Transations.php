<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account_Transations extends Model
{
    use HasFactory;
    protected $table = 'admin.transaction';
    public $timestamps = false;
    /**
     * Get the notes for the status.
     */
    public function getintegrador()
    {
        return $this->belongsTo('App\Models\User', 'user_id_integrador');
    }
}
