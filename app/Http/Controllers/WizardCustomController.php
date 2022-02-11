<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\People_Precadastro;
use App\Models\Institution;
use Illuminate\Support\Facades\DB;

class WizardCustomController extends Controller
{
    use SoftDeletes;

    private $totalPagesPaginate = 12;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //user data
        $you = auth()->user();
        //pegar tenant da conta selecionada
        $value = $request->session()->get('key-wizard');
        Config::set('database.connections.tenant.schema', $value);
        //validar se tem precadastro já realizado
        $validarprecadastro = People_Precadastro::where('user_id', $you->id);
        //se nao possuir precadastro
        if ($validarprecadastro->count() == 0) {
            //inserir no banco correto
            $people = new People_Precadastro();
            $people->name          = strtoupper($request->input('name'));
            $people->email         = auth()->user()->email;
            $people->mobile        = $request->input('mobile');
            $people->birth_at      = $request->input('birth_at');
            $people->address       = $request->input('address');
            $people->city          = $request->input('city');
            $people->state          = $request->input('state');
            $people->cep           = $request->input('cep');
            $people->country       = $request->input('country');
            $people->status_id = '21'; //pendente
            $people->role = '2'; //membro
            $people->sex       = $request->input('sex');
            $people->user_id = $you->id;
            $people->save();
            //adicionar log
            $this->adicionar_log('10', 'C', $people);

            $request->session()->flash("success", 'Cadastrado com sucesso, aguarde aprovação do administrador');
            return redirect()->route('account.index');
        } else {
            //se tiver precadastro
            session()->flash("info", "Você já possuiu vinculo, aguarde um administrador aprovar o seu acesso.");
            return redirect()->route('account.index');
        }
    }

    public function index($id)
    {
        //mater toda a sessao
        session()->forget('schema');
        session()->forget('key');
        session()->forget('conexao');

        //consultar o schema
        $results = Institution::where('unique_id', '=', $id)->first();
        //$results = DB::select('select * from admin.accounts where id = ?', [$id], 'limit 1');

        @dump($results);
        
        //inserir na array dos dados
        session()->put('schema', $results->tenant);

        //inserir o código
        session()->put('key', $id);

        //inserir o nome do schema
        session()->put('conexao', '$a');
        // Setando os dados da nova conexão.
        Config::set('database.connections.tenant.schema', $results->tenant);

        //inserir o nome da conta para envio do email
        session()->put('conta_name', $results->name_company);

        //se a selecao da conta estiver vazio
        if (session()->get('key') == null) {
            return redirect('login');
        };
        //retornar
        return redirect()->route('wizardCustom.create');
    }
    public function create()
    {
        //se a selecao da conta estiver vazio
        if (session()->get('key') == null) {
            return redirect('wizardList');
        };
        //carregar contas ativas
        return view('account.wizardCustom');
    }
}
