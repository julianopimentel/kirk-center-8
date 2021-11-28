<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Group extends Model
{
    use HasFactory;

    protected $connection = 'tenant';
    protected $table = 'groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_group', 'user_id', 'type'
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
        'deleted_at'
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }
    public function responsavel()
    {
        return $this->belongsTo('App\Models\People', 'user_id');
    }

    public function grouplist()
    {
        return $this->belongsTo(People::class, 'user_id', 'id');
    }
    
    public function getSender($sender)
    {
        return $this->where('name', 'LIKE', "%$sender%")
                    ->orWhere('email', $sender)
                    ->get()
                    ->first();    
    }   
    
    public function search(Array $data, $totalPagesPaginate)
    {
        return $this->where(function ($query) use ($data){
            if (isset($data['name']))
                $query->where('name_group',  'LIKE','%' . $data['name']. '%');
       
        })
        ->paginate($totalPagesPaginate);
    }
}
