<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menulist extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'menulist';
    public $timestamps = false; 
}
