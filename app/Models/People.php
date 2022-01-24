<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class People extends Model
{

    use HasFactory;

    protected $connection = 'tenant';
    protected $table = 'people';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'birth_at', 'address', 'country', 'state', 'city', 'role', 'cep', 
        'is_verify', 'is_visitor', 'is_transferred',
        'is_responsible',
        'is_conversion',
        'is_baptism',
        'is_newvisitor',
        'note',
        'image',
        'lat',
        'lng'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'is_active',
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
    
    public function historics()
    {
        return $this->hasMany(Historic::class);
    }
    
    public function getSender($sender)
    {
        return $this->where('name', 'LIKE', "%$sender%")
                    ->orWhere('email', $sender)
                    ->whereNull('deleted_at')
                    ->get()
                    ->first();    
    }   

    public function acesso()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function roleslocal()
    {
        return $this->belongsTo(Roles::class, 'role', 'id');
    }
    public function search(Array $data, $totalPagesPaginate)
    {
        return $this->where(function ($query) use ($data){
            if (isset($data['statuses']))
                $query->where('status_id', $data['statuses']);

            if (isset($data['is_responsible']))
                $query->where('is_responsible', $data['is_responsible']);

            if (isset($data['is_visitor']))
                $query->where('is_visitor', $data['is_visitor']);

            if (isset($data['is_baptism']))
                $query->where('is_baptism', $data['is_baptism']);

            if (isset($data['is_transferred']))
                $query->where('is_transferred', $data['is_transferred']);

            if (isset($data['is_conversion']))
                $query->where('is_conversion', $data['is_conversion']);

            if (isset($data['sex']))
                $query->where('sex', $data['sex']);

            if (isset($data['name']))
                $query->where('name',  'LIKE','%' . $data['name']. '%');

            if (isset($data['address']))
                $query->where('address',  'LIKE','%' . $data['address']. '%');

            if (isset($data['datefrom'], $data['dateto']))
                $query->whereBetween('created_at', [$data['datefrom'], $data['dateto']]); 
        })
        ->whereNull('deleted_at')
        ->paginate($totalPagesPaginate);
    }
}
