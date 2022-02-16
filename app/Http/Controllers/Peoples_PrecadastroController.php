<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\People_Precadastro;
use App\Models\Config_system;
use App\Models\People;
use App\Models\Users_Account;
use App\Mail\SendMailLiberar;
use Illuminate\Support\Facades\Mail;

class Peoples_PrecadastroController extends Controller
{

    private $totalPagesPaginate = 12;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
        $this->middleware('system');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(People_Precadastro $people_Precadastro)
    {
        //user data
        $you = auth()->user();
        //matar a session da acao
        session()->forget('aprovada-id');
        $this->get_tenant();
        //consulta
        $peoples = People_Precadastro::orderBy('id', 'desc')->with('status')->paginate($this->totalPagesPaginate);
        //carregar status
        $status = Status::all()->where("type", 'precadastro');
        
        return view('people_precadastro.index', compact('peoples', 'status'));
    }

    public function edit($id)
    {
        //user data
        $you = auth()->user();
        //pegar tenant
        $this->get_tenant();
        //carregar precadastro
        $people = People_Precadastro::with('acesso')->find($id);
        //carregar o campo obrigatoria
        $campo = Config_system::find('1')->first();
        //carregar o status
        $statuses = Status::all()->where("type", 'precadastro');
        return view('people_precadastro.EditForm', ['statuses' => $statuses, 'people' => $people]);
    }

    public function update(Request $request, $id)
    {
        //pegar tenant
        $this->get_tenant();
        $validatedData = $request->all([
            'name'             => 'required|min:1|max:255',
            'email'           => 'required',
            'phone'         => 'required',
        ]);
        //atualizar precadastro
        $people_pre = People_Precadastro::find($id);
        $people_pre->name          = $request->input('name');
        $people_pre->email         = $request->input('email');
        $people_pre->phone        = $request->input('phone_full');
        $people_pre->birth_at      = $request->input('birth_at');
        $people_pre->address       = $request->input('address');
        $people_pre->city          = $request->input('city');
        $people_pre->state          = $request->input('state');
        $people_pre->cep           = $request->input('cep');
        $people_pre->country       = $request->input('country');
        $people_pre->status_id = '22'; //aprovado
        $people_pre->role = '2';    //grupo membro
        $people_pre->is_verify       = 'true';
        $people_pre->sex       = $request->input('sex');
        //adicionar pessoa
        $people = new People();
        $people->user_id          = session()->get('aprovada-id');
        $people->name          = $request->input('name');
        $people->email         = $request->input('email');
        $people->phone        = $request->input('phone_full');
        $people->birth_at      = $request->input('birth_at');
        $people->address       = $request->input('address');
        $people->city          = $request->input('city');
        $people->state          = $request->input('state');
        $people->cep           = $request->input('cep');
        $people->country       = $request->input('country');
        $people->status_id = '14'; //ativado
        $people->role = '2'; //membro 
        $people->is_visitor       = $request->input('is_visitor');
        $people->is_transferred       = $request->input('is_transferred');
        $people->is_responsible       = $request->input('is_responsible');
        $people->is_conversion       = $request->input('is_conversion');
        $people->is_baptism       = $request->input('is_baptism');
        $people->is_verify       = 'true';
        $people->sex       = $request->input('sex');
        $people->note       = $request->input('note');

        //criar o acesso vinculado a conta se for aprovado
        $response = $this->criar(session()->get('aprovada-id'), session()->get('key'));
        if ($response['success']) {
            $people_pre->save();
            $people->save();
            //adicionar log
            $this->adicionar_log('6', 'C', $people_pre);
            $this->adicionar_log('1', 'C', $people);

            //disparar o email
            $conta_name = session()->get('conta_name');
            Mail::to($people->email)->queue(new SendMailLiberar($conta_name));

            return redirect('peopleList')
                ->with('success', $response['message']);
        }
        return redirect()
            ->back()
            ->with('error', $response['message']);

        $request->session()->flash("success", "Cadastro aprovado");
        return redirect()->route('people_precadastro.index');
    }

    public function criar($user_id, $accout_id): array
    {
        //recebar os dados o vinculo da conta
        DB::beginTransaction();
        $useraccount = new Users_Account();
        $useraccount->user_id = $user_id;
        $useraccount->account_id = $accout_id;
        $useraccount->save();

        if ($useraccount) {
            //adicionar log
            $this->adicionar_log_global('11', 'C', $useraccount);
            DB::commit();

            return [
                'success' => true,
                'message' => 'Criado o acesso!',
            ];
        } else {

            DB::rollback();

            return [
                'success' => false,
                'message' => 'Ocorreu um erro!',
            ];
        }
    }

    public function reprovar($id)
    {
        //pegar tenant
        $this->get_tenant();
        //reprovar o precadastro alterando o status
        $people = People_Precadastro::find($id);
        if ($people) {
            //adicionar o status
            $people->status_id = '23';
            //adicionar log
            $this->adicionar_log('6', 'D', $people);
            $people->save();
            session()->flash("info", "Reprovado com sucesso");
            return redirect()->route('peopleList.index');
        }
    }

    public function searchHistoric(Request $request, People_Precadastro $people)
    {
        //pegar tenant
        $this->get_tenant();
        //carregar status
        $status = Status::all()->where("type", 'precadastro');
        $dataForm = $request->except('_token');
        //carregar pesquisa
        $peoples =  $people->search($dataForm, $this->totalPagesPaginate);

        return view('people_precadastro.index', compact('peoples', 'dataForm', 'status'));
    }
}