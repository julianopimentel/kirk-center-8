<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class People_Groups extends Model
{
    use HasFactory;

    protected $connection = 'tenant';
    protected $table = 'people_group';
    public $timestamps = false;
    /**
     * Get the notes for the status.
     */
    //Item em um Array que são utilizados 
    //para preenchimento da informação.
    protected $fillable   = ['user_id', 'group_id'];

    public function grupo()
    {
        return $this->belongsTo('App\Models\Group', 'group_id');
    }
    public function usuario()
    {
        return $this->belongsTo('App\Models\People', 'user_id');
    }
}
