<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    public function tenant(Request $request, $id)
    {
        //mater toda a sessao
        $request->session()->forget('schema');
        $request->session()->forget('key');
        $request->session()->forget('conexao');

        //consultar o schema
        $results = DB::select('select * from admin.accounts where id = ?', [$id]);

        //inserir na array dos dados
        $request->session()->put('schema', $results);

        //inserir o código
        $request->session()->put('key', $id);

        //consulta no array
        $tenant = $request->session()->get('schema');

        //pegar o valor do tenant
        foreach ($tenant as $element) {
            $a = $element->tenant;
        }
        // Setando os dados da nova conexão.
        Config::set('database.connections.tenant.schema', $a);

        //inserir o nome da conexão
        $request->session()->put('conexao', $a);

        return redirect()->route('home.index');
    }
}