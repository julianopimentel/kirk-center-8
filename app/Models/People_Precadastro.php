<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class People_Precadastro extends Model
{

    use HasFactory;

    protected $connection = 'tenant';
    protected $table = 'people_precadastro';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'birth_at', 'address', 'country', 'state', 'city', 'role', 'cep', 
        'is_verify', 'user_id', 'note', 'status_id',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'upteded_at' => 'datetime',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }
    
    public function acesso()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function search(Array $data, $totalPagesPaginate)
    {
        return $this->where(function ($query) use ($data){
            if (isset($data['status']))
                $query->where('status_id', $data['status']);

            if (isset($data['name']))
                $query->where('name',  'LIKE','%' . $data['name']. '%');
       
        })
        ->paginate($totalPagesPaginate);
    }
}
