<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Account extends Model
{
    use HasFactory;

    protected $table = 'admin.users_account';
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
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
}