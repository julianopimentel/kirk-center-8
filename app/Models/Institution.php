<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Institution extends Model
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
        'id','name_company', 'integrador', 'email', 'mobile', 'address1', 'address2', 'tenant', 'type', 'doc', 'cep', 'state', 'city', 'country',
    ];

    protected $primaryKey = 'id';
    protected $secundaryKey = 'unique_id';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


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
    public function search(array $data, $totalPagesPaginate)
    {
        return $this->where(function ($query) use ($data) {
            if (isset($data['name_company']))
                $query->where('name_company',  'LIKE', '%' . $data['name_company'] . '%');
            if (isset($data['integrador']))
                $query->where('integrador',  '=', $data['integrador']);
        })
            ->with('status')
            ->wherenull('deleted_at')
            ->paginate($totalPagesPaginate);
    }
    public function getIntegrador()
    {
        return $this->belongsTo('App\Models\Account_Integrador', 'integrador');
    }
    public function integrador()
    {
        return $this->belongsTo('App\Models\Account_Integrador', 'integrador');
    }
}
