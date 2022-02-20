<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users_Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    public function tenant(Request $request, $id)
    {
        //realizar a consulta e validar se realmente existe essa liberação
        $validaracesso = Users_Account::where('user_id', auth()->user()->id)->where('account_id', $id);
        if($validaracesso->count() == 0){
            error_log('Erro ao rodar migrations');
            //retornar com mensagem de erro
            $request->session()->flash("danger", 'Erro interno');
        }

        //mater toda a sessao
        session()->forget('schema');
        session()->forget('key');
        session()->forget('conexao');
        session()->forget('conta_name');

        //consultar o schema
        $results = DB::select('select * from admin.accounts where id = ?', [$id] , 'limit 1');

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
        //inserir o nome do schema
        $request->session()->put('conexao', $a);
        // Setando os dados da nova conexão.
        Config::set('database.connections.tenant.schema', $a);

        //inserir o nome da conta para envio do email
        $request->session()->put('conta_name', $element->name_company);

        return redirect()->route('home.index');
    }
}
