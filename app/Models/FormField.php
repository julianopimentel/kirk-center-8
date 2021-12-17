<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'form_field';

}