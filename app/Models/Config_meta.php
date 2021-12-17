<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class Config_meta extends Model
{

    use HasFactory;
    use Notifiable;

    protected $connection = 'tenant';
    protected $table ='config_meta';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'visitante_mes', 'batismo_mes', 'conversao_mes', 'pessoa_mes', 
        'visualizacao_mes', 'comentario_mes', 'grupo_ativo_ano', 'visitante_ano', 'batismo_ano',

        'conversao_ano', 'pessoa_ano', 'visuazacao_ano', 'comentario_ano', 'grupo_ativo_mes',
        'fin_dizimo_mes', 'fin_oferta_mes', 'fin_despesa_mes', 'fin_acao_mes', 'fin_dizimo_ano',
        'fin_oferta_ano', 'fin_despesa_ano', 'fin_acao_ano',
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
        'updated_at'
    ];

}
