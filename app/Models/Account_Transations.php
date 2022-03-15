<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account_Transations extends Model
{
    use HasFactory;
    protected $table = 'admin.transaction';
    public $timestamps = true;

    protected $fillable = [
        'id', 'user_id_integrador', 'quantity', 'type', 'total', 'user_id'
    ];
    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $dates = [
        'deleted_at', 'updated_at',
    ];

    public function getintegrador()
    {
        return $this->belongsTo('App\Models\Account_Integrador', 'user_id_integrador');
    }
}
