<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'menus';
    public $timestamps = false; 
}
