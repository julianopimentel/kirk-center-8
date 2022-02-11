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
        //carregar a tela de cadastro
        return view('account.wizardCustom');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //user data
        //$you = auth()->user();
        //pegar tenant da conta selecionada
        $value = session()->get('schema');
        Config::set('database.connections.tenant.schema', $value);
        //validar se tem precadastro já realizado
        $validarcadastro = People::where('email', $request->input('email'));
        //se nao possuir precadastro
        if ($validarcadastro->count() == 0) {
            //cadastrar a pessoa localmente na conta
            $people = new People();
            $people->name          = strtoupper($request->input('name').' '.$request->input('lastname'));
            $people->email         = $request->input('email');
            $people->mobile        = $request->input('mobile');
            $people->status_id = '21'; //pendente
            $people->role = '2'; //membro
            $people->user_id = $user->id;
            $people->save();
            //adicionar log
            $this->adicionar_log('10', 'C', $people);

            //cadastrar o seu acesso
//gerar hash
$pwa = Str::random(8);
//criar o usuario
$user =  User::create([
    'name' => $people->name,
    'email' => $people->email,
    'password' => Hash::make($pwa), //gerar senha
    'mobile' => $people->mobile
]);
//associar ao user
$user->assignRole('user');

//adicionar log
$this->adicionar_log_global('14', 'C', $user);

//validar email agora cadastrado
$validaruser = User::where('email', $people->email)->get();
//associar usuário a pessoa na conta local
$associar = People::where('email', $people->email)->first();
$associar->user_id = $validaruser->first()->id;
$associar->save();
//criar vinculo com a conta
$this->criar($user->id, session()->get('key'));
//disparar o email
$conta_name = session()->get('conta_name');
Mail::to($people->email)->send(new SendMailBemVindo($conta_name, $user->email, $pwa));



            $request->session()->flash("success", 'Cadastrado com sucesso, enviaremos seu dados de acesso por e-mail');
            return redirect()->route('account.index');
        } else {
            //se tiver precadastro
            session()->flash("info", "Você já possuiu vinculo, favor logar em sua conta");
            return redirect()->route('login.index');
        }
    }
}
