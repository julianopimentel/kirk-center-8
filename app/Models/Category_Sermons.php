<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category_Sermons extends Model
{
    use HasFactory;
    protected $connection = 'tenant';
    protected $table = 'category_sermons';
    /**
     * Get the notes for the status.
     */

    public function getCatAttribute($value)
    {
        return $this->attributes['cat'] = json_decode($value);
    }
}
