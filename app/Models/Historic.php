<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Historic extends Model
{
    protected $connection = 'tenant';
    protected $fillable = ['type', 'amount', 'total_before', 'total_after', 'user_id_transaction', 'date', 'tipo', 'data_lancamento', 'observacao', 'pag', 'user_id', 
    'itens',
    'sub_total',
    'total_tax',
    'discount',
    'grand_total'];

    public function type($type = null)
    {
        $types = [
            'I' => 'Entrada',
            'O' => 'Retirada',
           // 'T' => 'Transferência',
        ];

        if (!$type) {
            return $types;
        }

        if ($this->user_id_transaction != null && $type == 'I') {
            return 'Recebido';
        }

        return $types[$type];
    }
    public function userSender()
    {
        return $this->belongsTo(People::class, 'user_id_transaction');    
    }

    public function getDateAttribute($valor)
    {
        return Carbon::parse($valor)->format('d/m/Y');
    }

    public function search(Array $data, $totalPagesPaginate)
    {
        return $this->where(function ($query) use ($data){
            if (isset($data['id']))
                $query->where('id', $data['id']);

            if (isset($data['datefrom'], $data['dateto']))
            $from = $data['datefrom'];
            $to = $data['dateto'];

                $query->whereBetween('date', [$from, $to]);  

            if (isset($data['pag']))
                $query->where('pag', $data['pag']);

            if (isset($data['tipo']))
                $query->where('tipo', $data['tipo']);

            if (isset($data['type']))
                $query->where('type', $data['type']);        
        })
        //->toSql(); dd($historics);
        // filtro por usuário ->where('user_id', auth()->user()->id)
        ->with(['userSender'])
        ->orderby('id','desc')
        ->paginate($totalPagesPaginate);
    }
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'tipo');
    }
    public function statuspag()
    {
        return $this->belongsTo('App\Models\Status', 'pag');
    }
    public function seusdizimos()
    {
        return $this->belongsTo('App\Models\People', 'user_id_transaction', 'id');
    }

}