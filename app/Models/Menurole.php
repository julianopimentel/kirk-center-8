<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menurole extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'menu_role';
    public $timestamps = false; 
}
