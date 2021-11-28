<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Auditoria_global extends Model
{
    public $timestamps = false;
    protected $table = 'admin.activity_log';

    protected $fillable = ['type', 'activity_id', 'user_id', 'tenant', 'manipulations', 'created_at'];

    public function log_global($activity_id, $type, $manipulations): array
    {
        Config::set('database.connections.pgsql.schema', 'admin'); 
        DB::beginTransaction();
        $log = Auditoria_global::create([
            'activity_id' => $activity_id,
            'type' => $type,
            'tenant' => session()->get('conexao'),
            'user_id' => auth()->user()->id,
            'manipulations' => $manipulations,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        if ($log) {

            DB::commit();

            return [
                'success' => false,
                'message' => 'Problema ao adicionar o item!',
            ];

        } else {

            DB::rollback();

            return [
                'success' => false,
                'message' => 'Ocorreu um erro!',
            ];

        }
    }
    public function type($type = null)
    {
        $types = [
            'C' => 'create',
            'E' => 'edit',
            'D' => 'destroy',
            'S' => 'show',
            'U' => 'update',
        ];

        if (!$type) {
            return $types;
        }
        return $types[$type];
    }
    public function status_log()
    {
        return $this->belongsTo('App\Models\Status_log', 'activity_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}