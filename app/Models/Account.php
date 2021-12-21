<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
     
    protected $connection = 'pgsql';
    protected $table = 'accounts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_company', 'integrador', 'email', 'mobile', 'address1', 'address2', 'tenant', 'type', 'doc', 'cep', 'state', 'city', 'country',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $dates = [
        'deleted_at', 'updated_at',
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }
    public function AccountList()
    {
        return $this->belongsTo('App\Models\Users_Account', 'account_id');
    }
    public function search(Array $data, $totalPagesPaginate)
    {
        return $this->where(function ($query) use ($data){
            if (isset($data['name']))
                $query->where('name_company',  'LIKE','%' . $data['name']. '%');

        })
        ->paginate($totalPagesPaginate);
    }
}
