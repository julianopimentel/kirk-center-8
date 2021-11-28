<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Auditoria extends Model
{
    public $timestamps = false;
    protected $connection = 'tenant';
    protected $table = 'activity_log';

    protected $fillable = ['type', 'activity_id', 'user_id', 'manipulations', 'created_at'];

    
    public function log($activity_id, $type, $manipulations): array
    {
        Config::set('database.connections.tenant.schema', session()->get('conexao'));

        DB::beginTransaction();
        $log = Auditoria::create([
            'activity_id' => $activity_id,
            'type' => $type,
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