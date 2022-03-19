<?php

namespace App\Http\Controllers;

use App\Models\Account_Integrador;
use App\Models\Account_Transations;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Institution;
use App\Models\User;
use App\Models\Users;
use DataTables;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware('admin');
    }

    public function indexAdmin(Request $request)
    {
        if ($request->ajax()) {
            $data = Institution::with('integrador')
                ->with('status')
                ->wherenull('deleted_at')
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
        $users = Users::all()->where('master', true)->wherenull('integrador_id');

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
        $validatedData = $request->validate([
            'user_integrador'           => 'required',
            'doc'           => 'required',
            'email'           => 'required',
            'name_company'           => 'required',
            'phone_full'           => 'required',
        ]);
        //user data
        $user = auth()->user();
        //salvar integrador
        $integrador = new Account_Integrador();
        $integrador->name_company      = $request->input('name_company');
        $integrador->doc      = $request->input('doc');
        $integrador->email      = $request->input('email');
        $integrador->mobile      = $request->input('phone_full');
        $integrador->address1       = $request->input('address');
        $integrador->city       = $request->input('city');
        $integrador->state       = $request->input('state');
        $integrador->cep       = $request->input('cep');
        $integrador->country       = $request->input('country');
        $integrador->license       = '0';
        $integrador->inadiplente       = false;
        $integrador->status_id = '14';
        $integrador->user_integrador     = $request->input('user_integrador');
        $integrador->save();
        //atualizar o user
        $user = User::find($integrador->user_integrador);
        $user->integrador_id       = $integrador->id;
        $user->master      = true;
        $user->save();

        $request->session()->flash("success", 'Criado com sucesso');
        return redirect()->back();
    }
    public function IntegradorUpdate(Request $request, $id)
    {
        $integrador = Account_Integrador::find($id);
        $integrador->name_company      = $request->input('name_company');
        $integrador->doc      = $request->input('doc');
        $integrador->email      = $request->input('email');
        $integrador->mobile      = $request->input('phone_full');
        $integrador->address1       = $request->input('address');
        $integrador->city       = $request->input('city');
        $integrador->state       = $request->input('state');
        $integrador->cep       = $request->input('cep');
        $integrador->country       = $request->input('country');
        $integrador->license       = $request->input('license');
        $integrador->inadiplente       = $request->has('inadiplente') ? 1 : 0;
        $integrador->status_id = '14';
        $integrador->save();

        return redirect()->back()->with('success', 'Editado com sucesso!');
    }

    public function blogShow($id)
    {
        $results = Blog::find($id);
        return view('site.blog.blogShow', compact('results'));
    }

    public function blogPost()
    {
        if (Auth::check() == true) {
            if (Auth::user()->master == true) {
                return view('site.blog.post');
            } else
                session()->flash("info", 'Erro interno');
            return redirect()->back();
        } else
            session()->flash("info", 'Erro interno');
        return redirect()->back();
    }
    public function blogStore(Request $request)
    {
        if (Auth::check() == true) {
            if (Auth::user()->master == true) {

                $blog = new Blog();
                $blog->title     = $request->input('title');
                $blog->content   = $request->input('content');
                $blog->status_id = $request->input('status_id');
                $blog->image   = $request->input('image');
                $blog->note_type = $request->input('note_type');
                $blog->users_id = Auth::user()->id;
                $blog->save();

                //$this->adicionar_log('19', 'C', $blog);
                $request->session()->flash('success', 'Blog' . __('action.creat'));
                return redirect()->route('blog');
            } else
                session()->flash("info", 'Erro interno');
            return redirect()->back();
        }
    }
}
