<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationMoneyFormRequest;
use App\Models\Balance;
use App\Models\Status;
use App\Models\People;
use Illuminate\Http\Request;
use App\Models\Historic;
use App\Models\Institution;
use App\Models\User;

class BalanceController extends Controller
{
    //consulta padrão
    private $totalPagesPaginate = 12;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
        $this->middleware('system');
    }

    //index
    public function index(Historic $historic, Request $request)
    {
        //tipos entrada ou saida
        $types = $historic->type();
        //pegar o codigo da conta
        $conta = session()->get('key');
        //saldo da conta
        $balance = Balance::where('account_id', $conta)->first();
        //converter para apresentacao no index
        $amount = number_format($balance ? $balance->amount : 0, '2', ',', '.');

        $month = empty($request->get('month')) ? date('m') : $request->get('month');
        $year = empty($request->get('year')) ? date('Y') : $request->get('year');


        $transactions = Historic::with('status')->with('statuspag')->whereMonth('date', $month)->whereYear('date', $year)->orderBy('date')->get();

        $categories = Historic::latest()->get();

        $month_zero = Historic::whereMonth('date', $month)->whereYear('date', $year)->whereType('O')->sum('amount');
        $month_one = Historic::whereMonth('date', $month)->whereYear('date', $year)->whereType('I')->sum('amount');

        $year_zero = Historic::whereYear('date', $year)->whereType('O')->sum('amount');
        $year_one = Historic::whereYear('date', $year)->whereType('I')->sum('amount');

        $all_zero = Historic::whereType('O')->sum('amount');
        $all_one = Historic::whereType('I')->sum('amount');

        //retirada
        //status da forma de pagamento
        $statuspag = Status::all()->where("type", 'pagamento');
        //status do tipo de movimento
        $statusfinan = Status::all()->where("type", 'financial')->where('class', 'retira');

        //entrada
        //listar tipo de movimeto (dizimo...)
        $statusfinanentra = Status::all()->where("type", 'financial')->where('class', 'entrada');
        //pessoas temporario
        $people = People::select("id", "name", "email")
            ->orderby('name', 'asc')
            ->where('is_admin', false)
            ->get();

        return view('balance.index', compact('amount', 'statuspag', 'statusfinanentra', 'people', 'statusfinan', 'types', 'transactions', 'categories', 'month_zero', 'month_one', 'year_zero', 'year_one', 'all_zero', 'all_one'));
    }

    //autocompletar pessoa em ajax
    public function dataAjax(Request $request)
    {
        //pegar tenant
        $this->get_tenant();
        //consultar pessoas
        $data = People::select("id", "name", "email")
            ->orderby('name', 'asc')
            ->where('is_admin', false)
            ->get();
        if ($request->has('q')) {
            $search = $request->q;
            $data = People::select("id", "name", "email")
                ->where('name', 'LIKE', "%$search%")
                ->where('is_admin', false)
                ->orderby('name', 'asc')
                ->get();
        }
        //retorno para o ajax
        return response()->json($data);
    }


    public function depositStore(ValidationMoneyFormRequest $request)
    {
        //pegar tenant
        $this->get_tenant();
        //código da conta
        $conta = session()->get('key');
        //consulta
        $balance = Balance::where('account_id', $conta)->first();

        //lista de itens em um array
        $data['item'] = $request->product_description;
        $data['quantity'] = $request->quantity;
        $data['price'] = $request->price;
        $data['tax'] = $request->tax;
        $data['total'] = $request->total;

        //enviar os dados para o balance/deposit
        $response = $balance->deposit(
            $request->valor,
            $request->pag,
            $request->date_lancamento,
            $request->observacao,
            $request->tipo,
            $request->itemName,
            $data,
            $request->sub_total,
            $request->total_tax,
            $request->discount
        );
        //retorno ok
        if ($response['success']) {
            return redirect()->back()
                ->with('success', $response['message']);
        }
        //se estiver algum campo faltando no deposit
        return redirect()
            ->back()
            ->with('error', $response['message']);
    }
    public function withdrawStore(ValidationMoneyFormRequest $request)
    {
        //pegar tenant
        $this->get_tenant();
        //código da conta
        $conta = session()->get('key');
        //consulta
        $balance = Balance::where('account_id', $conta)->first();
        //insert do balance/withdraw
        $response = $balance->withdraw($request->valor, $request->pag, $request->date_lancamento, $request->observacao, $request->tipo, $request->itemName);
        if ($response['success']) {
            return redirect()->back()
                ->with('success', $response['message']);
        }
        //retorno se estiver algo errado
        return redirect()
            ->back()
            ->with('error', $response['message']);
    }

    //invoce com detalhes
    public function show($id)
    {
        //pegar tenant
        $this->get_tenant();
        //pegar o código
        $codigo = session()->get('key');
        //consulta do invoce individual
        $historics = Historic::find($id);
        //validar o id se existe
        if ($historics == null) {
            session()->flash("danger", "Erro interno");
            return redirect()->route('group.index');
        }
        //dados da conta
        $account = Institution::find($codigo);
        //dados da pessoa se estiver associada a movimentação
        $people = People::find($historics->user_id_transaction);
        //forma de pagamento
        $statuspag = Status::find($historics->pag);
        //tipo de movimento
        $statusfinan = Status::find($historics->tipo);
        //usuario que cadastrou o invoce
        $usuario = User::find($historics->user_id);
        //carregar os itens adicionados em do json para um array  
        $listar = $historics->itens;

        return view('balance.detail', compact('historics', 'account', 'people', 'statuspag', 'statusfinan', 'usuario', 'listar'));
    }
}
