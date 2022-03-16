<?php

namespace App\Http\Controllers;

use App\Models\Account_Integrador;
use App\Models\Account_Transations;
use Illuminate\Http\Request;
use App\Models\Institution;
use App\Models\User;
use App\Models\Users;
use DataTables;
use Illuminate\Support\Facades\Date;

class AdminController extends Controller
{

    private $totalPagesPaginate = 8;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('throttle:1,0.001');
    }

    public function indexAdmin(Request $request)
    {
        if ($request->ajax()) {
            $data = Institution::with('integrador')
                ->with('status')
                //->wherenull('deleted_at')
                // ->orderby('name_company', 'asc')
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="account/' . $row->id . '/edit" class="btn btn-primary-outline"><i
                        class="c-icon c-icon-sm cil-pencil text-success"></i></a>';
                    $btn = $btn . '<a href="account/' . $row->id . '/delete" class="btn btn-primary-outline"><i
                        class="c-icon c-icon-sm cil-trash text-danger"></i></a>';
                    $btn = $btn . '<a href="tenant/' . $row->id . '" class="btn btn-primary-outline"><i
                        class="c-icon c-icon-sm cil-room text-dark"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('account.ListAdminTeste');
    }

    public function searchAccount(Request $request, Institution $institutions)
    {
        //pegar tenant
        $this->get_tenant();
        $dataForm = $request->except('_token');
        //consulta da pesquisa
        $institutions =  $institutions->search($dataForm, $this->totalPagesPaginate);
        //pegar os integradores
        $integradores = Account_Integrador::get();
        return view('account.ListAdmin', compact('institutions', 'integradores'));
    }

    public function transactionsIndex()
    {
        //user data
        $you = auth()->user();
        //consulta de contas ativas
        $pagamentos = Account_Transations::with('getIntegrador:id,name_company')->paginate(10);
        //consultar integrador
        $integrador = Account_Integrador::all();
        return view('account.Transations', compact('pagamentos', 'integrador'));
    }

    public function integradorIndex()
    {
        //consulta de contas ativas
        $integradores = Account_Integrador::with('status')->with('getUser:id,name')->paginate(10);
        //consultar user integrador
        $users = Users::all()->where('master', true);

        return view('account.Integrador', compact('integradores', 'users'));
    }
    public function transactionsStore(Request $request)
    {
        $validatedData = $request->validate([
            'user_id_integrador'           => 'required',
        ]);
        //user data
        $user = auth()->user();
        $transation = new Account_Transations();
        $transation->user_id_integrador    = $request->input('user_id_integrador');
        $transation->type    = $request->input('type');
        $transation->quantity    = $request->input('quantity');
        $transation->note    = $request->input('note');
        $transation->total    = $request->input('total');
        $transation->user_id = $user->id;
        $transation->save();
        //adicionar log
        $request->session()->flash("success", 'Transação Adicionada');
        return redirect()->back();
    }

    public function integradorStore(Request $request)
    {
        //pegar tenant
        $this->get_tenant();
        $validatedData = $request->validate([
            'body'           => 'required',
        ]);
        //user data
        $user = auth()->user();
        //salvar integrador
        $integrador = new Account_Integrador();
        $integrador->name_company      = $request->input('name_company');
        $integrador->doc      = $request->input('doc');
        $integrador->email      = $request->input('email');
        $integrador->mobile      = $request->input('phone_full');
        $integrador->address1       = $request->input('address1');
        $integrador->city       = $request->input('city');
        $integrador->state       = $request->input('state');
        $integrador->lat       = $request->input('lat');
        $integrador->lng       = $request->input('lng');
        $integrador->cep       = $request->input('cep');
        $integrador->status_id = $request->input('type');
        $integrador->doc     = $request->input('doc');
        $integrador->user_integrador     = $request->input('user_integrador');
        $integrador->save();
        //atualizar o user
        $user = User::find($integrador->user_integrador);
        $user->integrador_id       = $integrador->id;
        $user->master      = true;
        $user->save();

        $request->session()->flash("success", 'Adicionado integrador com sucesso, favor vincular ao usuário');
        return redirect()->back();
    }
}
