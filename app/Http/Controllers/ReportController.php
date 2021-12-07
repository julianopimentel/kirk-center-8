<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Status;
use App\Models\People;
use Illuminate\Http\Request;
use App\Models\Historic;

class ReportController extends Controller
{

    private $totalPagesPaginate = 9999;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
    }

    public function index()
    {
        //pegar o tenant
        $this->get_tenant();
        return view('reports.Report');
    }

    public function Financial(Historic $historic)
    {
        //pegar tenant
        $this->get_tenant();
        //carregar historico
        $historics = Historic::with('status')->with('statuspag')
            ->orderby('id', 'desc')
            ->whereBetween('date', [date('Y/m/d'), date('Y/m/d')])
            ->paginate($this->totalPagesPaginate);
        //pegar os tupos
        $types = $historic->type();

        //valores de somatoria da consulta
        $total_preco = $historics->sum('amount');
        $total_entrada = $historics->where('type', 'I')->sum('amount');
        $total_saida = $historics->where('type', 'O')->sum('amount');

        //carregar status
        $statuspag = Status::all()->where("type", 'pagamento');
        $statusfinan = Status::all()->where("type", 'financial');

        return view('reports.Financial', compact('historics', 'types', 'statuspag', 'statusfinan', 'total_preco', 'total_entrada', 'total_saida'));
    }

    public function searchFinancial(Request $request, Historic $historic)
    {
        //pegar tenant
        $this->get_tenant();
        $dataForm = $request->except('_token');
        //consulta da pesquisa
        $historics =  $historic->search($dataForm, $this->totalPagesPaginate);
        //carregar tipos
        $types = $historic->type();

        //valores de somatoria da consulta
        $total_preco = $historics->sum('amount');
        $total_entrada = $historics->where('type', 'I')->sum('amount');
        $total_saida = $historics->where('type', 'O')->sum('amount');

        //carregar status
        $statuspag = Status::all()->where("type", 'pagamento');
        $statusfinan = Status::all()->where("type", 'financial');

        return view('reports.Financial', compact('historics', 'types', 'dataForm', 'statuspag', 'statusfinan', 'total_preco', 'total_entrada', 'total_saida'));
    }

    public function People(People $historic)
    {
        //pegar tenant
        $this->get_tenant();
        //consulta
        $peoples = People::orderBy('name', 'asc')
            ->with('status')
            ->whereBetween('created_at', [date('Y/m/d'), date('Y/m/d')])
            ->paginate($this->totalPagesPaginate);
        //carregar status
        $statuses = Status::all()->where("type", 'people');
        return view('reports.People', compact('peoples', 'statuses'));
    }

    public function searchPeople(Request $request, People $peoples)
    {
        //pegar tenant
        $this->get_tenant();
        $dataForm = $request->except('_token');
        //carregar status
        $statuses = Status::all()->where("type", 'people');
        //consulta da pesquisa
        $peoples =  $peoples->search($dataForm, $this->totalPagesPaginate);

        return view('reports.People', compact('peoples', 'dataForm', 'date', 'statuses'));
    }

    public function Group(Group $group)
    {
        //pegar tenant
        $this->get_tenant();
        //consulta + status + responsavel + vinculos das pessoas
        $groups = Group::orderBy('name_group', 'asc')->with('status')->with('responsavel')->with('grouplist')->paginate($this->totalPagesPaginate);
        return view('reports.Group', compact('groups'));
    }

    public function searchHistoric(Request $request, Group $group)
    {
        //pegar tenant
        $this->get_tenant();
        $dataForm = $request->except('_token');
        //carregar pesquisa
        $groups =  $group->search($dataForm, $this->totalPagesPaginate);
        return view('reports.Group', compact('groups', 'dataForm'));
    }

    public function Location(People $historic)
    {
        //pegar tenant
        $this->get_tenant();
        //consultar map das pessoas informadas e carregar no google maps
        $peoples = People::whereNotNull('lat')->get();
        return view('reports.PeopleLoc', compact('peoples'));
    }
}
