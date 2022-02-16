<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\People_Precadastro;
use App\Models\Institution;

class WizardController extends Controller
{
    use SoftDeletes;

    private $totalPagesPaginate = 12;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //se for admin, nao usar o wizard
        if (auth()->user()->isAdmin() == true) {
            session()->flash("error", 'Wizard não habilitado para admin');
            return redirect('account');
        };
        //carregar contas ativas
        $institutions = Institution::all()->where('deleted_at', '=', null);
        return view('account.wizardList', ['institutions' => $institutions]);
    }
    
    public function searchAccount(Request $request, Institution $institution)
    {
        $dataForm = $request->except('_token');
        //carregar pesquisa das contas ativas
        $institutions =  $institution->search($dataForm, $this->totalPagesPaginate)->where('deleted_at', '=', null);
        return view('account.wizardList', compact('institutions', 'dataForm'));
    }
    public function create()
    {
        //se for admin não habilitar o wizard
        if (auth()->user()->isAdmin() == true) {
            session()->flash("error", 'Wizard não habilitado para admin');
            return redirect('account');
        };
        //se a selecao da conta estiver vazio
        if (session()->get('key-wizard') == null) {
            return redirect('wizardList');
        };
        //carregar contas ativas
        $institutions = Institution::all()->where('deleted_at', '=', null);
        return view('account.wizard', ['institutions' => $institutions]);
    }
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
        if ($validarprecadastro->count() == 0)
        {     
        //inserir no banco correto
        $people = new People_Precadastro();
        $people->name          = strtoupper($request->input('name'));
        $people->email         = auth()->user()->email;
        $people->phone        = $request->input('phone');
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
        }
        else{
            //se tiver precadastro
           session()->flash("info", "Você já possuiu vinculo, aguarde um administrador aprovar o seu acesso.");
           return redirect()->route('account.index');
        }
    }

    public function tenantWizard(Request $request, $id)
    {
        //mater toda a sessao
        $request->session()->forget('key-wizard');
        //inserir o código
        $request->session()->put('key-wizard', $id);
        //retornar
        return redirect()->route('wizard.create');
    }
}