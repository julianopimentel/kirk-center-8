<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Models\API\User_Account;

class AccountController extends Controller
{
    // get all account
    public function index()
    {
        $you = auth()->user();
        return response([
            'account' => User_Account::where('user_id', $you->id)
            ->with('accountlist')
            ->get()
        ], 200);
    }

    public function tenant($id)
    {
        //mater toda a sessao
        $results = DB::select('select * from admin.accounts where id = ?', [$id]);

        //pegar valor na sesscion
        $tenant = $results;

        foreach ($tenant as $element) {
            $a = $element->tenant;
        }

        // Make sure to use the database name we want to establish a connection.
        // Setando os dados da nova conexão.
        Config::set('database.connections.tenant.schema', $a);

        //inserir o nome da conexão

        return response([
            'message' => 'Bem vindo',
            'tenant' => Config::get('database.connections.tenant.schema')
        ], 200);
    }
}
