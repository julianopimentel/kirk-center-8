<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users_Account extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'users_account';
    public $timestamps = false;
    /**
     * Get the notes for the status.
     */
        //Primary Key da Tabela.
        protected $primaryKey = 'id';

        //Item em um Array que são utilizados
        //para preenchimento da informação.
        protected $fillable   = ['user_id','account_id'];

    public function accountlist()
    {
        return $this->belongsTo(Institution::class, 'account_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }
}
