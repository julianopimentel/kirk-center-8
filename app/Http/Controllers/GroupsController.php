<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Status;
use App\Models\Group;
use App\Models\People_Groups;
use App\Models\People;


class GroupsController extends Controller
{

    private $totalPagesPaginate = 10;
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
    public function index(Group $group)
    {
        //pegar tenant
        $this->get_tenant();
        //consulta dos grupos + status + responsavel + vinculo pessoa
        $groups = Group::orderBy('name_group', 'asc')->with('status')->with('responsavel')->with('grouplist')->paginate($this->totalPagesPaginate);
        return view('group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //carregar status
        $statuses = Status::all()->where("type", 'people');
        //pessoas temporario
        $people = People::select("id", "name", "email")
            ->orderby('name', 'asc')
            ->where('is_admin', false)
            ->get();
        return view('group.createForm', compact('people'), ['statuses' => $statuses]);
    }

    public function store(Request $request)
    {
        //pegar tenant
        $this->get_tenant();
        $validatedData = $request->all([
            'name_group'             => 'required|min:1|max:255',
            'tipo'           => 'required',
        ]);
        //adicionar novo grupo
        $group = new Group();
        $group->name_group          = $request->input('name_group');
        $group->type         = $request->input('tipo');
        $group->user_id        = $request->input('itemName');
        $group->status_id      = $request->input('status_id');
        $group->count      = '1';
        $group->note       = $request->input('note');
        $group->save();
        //adicionar log
        $this->adicionar_log('2', 'C', $group);
        //pegar o ultimo id criado no grupo
        $contador = Group::latest('id')->get()->first()->id;
        //adicionar responavel no grupo
        $adicionarpessoa = new People_Groups();
        $adicionarpessoa->group_id          = $contador;
        $adicionarpessoa->user_id        = $request->input('itemName');
        $adicionarpessoa->registered = date('Y-m-d H:m:s');
        $adicionarpessoa->save();
        //adicionar log
        $this->adicionar_log('12', 'C', $adicionarpessoa);

        $request->session()->flash("success", "Successfully created group");
        return redirect()->route('group.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //pegar tenant
        $this->get_tenant();
        $group = Group::find($id);
        //validar o id se existe
        if ($group == null) {
            session()->flash("danger", "Erro interno");
            return redirect()->route('group.index');
        }
        //carregar status de pessoa
        $statuses = Status::all()->where("type", 'people');
        return view('group.EditForm', ['statuses' => $statuses, 'group' => $group]);
    }

    public function update(Request $request, $id)
    {
        //pegar tenant
        $this->get_tenant();
        $validatedData = $request->validate([
            'name_group'             => 'required|min:1|max:255',
            'tipo'           => 'required',

        ]);
        $group = Group::find($id);
        $group->name_group          = $request->input('name_group');
        $group->type         = $request->input('tipo');
        $group->user_id        = $request->input('itemName');
        $group->status_id      = $request->input('status_id');
        $group->note       = $request->input('note');

        //buscar o id grupo
        $group1 = Group::find($id);
        //filtrar nos grupos o responsavel
        $validaruser = People_Groups::where('group_id', $id)->whereIn('user_id', [$group1->user_id, $request->input('itemName')]);
        if ($validaruser) {
            //deletar do usuário antigo e atual vinculados ao grupo
            $validaruser->delete();
            //adicionar log
            $this->adicionar_log('12', 'D', '{"group_id":"' . $id . '","user_id":"' . $group1->user_id . ',' . $request->input('itemName') . '"}');
        }
        //adicionar novamente o novo responsavel
        $adicionarpessoa = new People_Groups();
        $adicionarpessoa->group_id          =  $id;
        $adicionarpessoa->user_id        = $request->input('itemName');
        $adicionarpessoa->registered = date('Y-m-d H:m:s');
        $adicionarpessoa->save();
        //adicioanr log
        $this->adicionar_log('12', 'U', $adicionarpessoa);

        //fazer a contagem do numero de pessoas novamente
        $group->count = People_Groups::with('grupo')->with('usuario')->where('group_id', $id)->count();
        //adicionar log
        $this->adicionar_log('2', 'U', $group);
        $group->save();

        session()->flash("success", "Successfully updated group");
        return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //pegar tenant
        $this->get_tenant();
        $group = Group::find($id);
        if ($group) {
            //deletar grupo
            $group->delete();
            //adicionar log
            $this->adicionar_log('2', 'D', $group);
        }
        //validar pessoas vinculadas ao grupo
        $validaruser = People_Groups::where('group_id', $id);
        if ($validaruser) {
            //desvincular todas as pessoas do grupo ao excluir
            $validaruser->delete();
            //adicionar log
            $this->adicionar_log('12', 'D', '{"delete_peoplegroup":"' . $id . '"}');
        }
        session()->flash("warning", "Sucessfully deleted group");
        return redirect()->route('group.index');
    }


    public function searchHistoric(Request $request, Group $group)
    {
        //pegar tenant
        $this->get_tenant();
        //permissao
        $dataForm = $request->except('_token');
        //nova consulta
        $groups =  $group->search($dataForm, $this->totalPagesPaginate);

        return view('group.index', compact('groups', 'dataForm'));
    }

    public function show($id)
    {
        $group = Group::find($id);
        //pesquisar pessoas associada ao grupo
        $pessoasgrupos = People_Groups::with('usuario')->where('group_id', $id)->get();

        $retirarpessoas = People_Groups::select('user_id')->where('group_id', $id)->get();

        //consultar o responsavel do grupo
        $responsavel = People::find($group->user_id);

        //retirar pessas já colocadas no grupo
        // dd($tagIds);
        $people = People::with('grupos')
            ->orderby('name', 'asc')
            ->where('is_admin', false)
            ->whereNotIn('id', $retirarpessoas->pluck('user_id')->toArray())
            //->where('id','LIKE','%'.$tags.'%')
            ->get();
        //dd($people);

        return view('group.Show', compact('group', 'responsavel', 'people'), ['pessoasgrupos' => $pessoasgrupos]);
    }

    //adicionar nova pessoa ao grupo
    public function storepeoplegroup(Request $request)
    {
        //pegar tenant
        $this->get_tenant();
        //pegar valor do grupo
        $value = $request->session()->get('group');
        $validatedData = $request->all([
            'itemName'             => 'required',
        ]);
        //adicionar pessoa
        $adicionarpessoa = new People_Groups();
        $adicionarpessoa->group_id          = $value;
        $adicionarpessoa->user_id        = $request->input('itemName');
        $adicionarpessoa->registered = date('Y-m-d H:m:s');
        //validar se possuiu vinculo
        $validarpessoa = People_Groups::where('user_id', $request->input('itemName'))->where('group_id', $value);
        //pegar valor para somar
        $adicionarsoma = Group::find($value);
        //valor atual do grupo
        $adicionarsoma->count = $adicionarsoma->count + 1;

        //validacao para inserir um valor igual
        if ($validarpessoa->count() == 0) {
            //salvar todos os dados se nao tiver vinculo com o grupo
            $adicionarsoma->save();
            $adicionarpessoa->save();
            //adicionar log
            $this->adicionar_log('12', 'C', $adicionarpessoa);
            $request->session()->flash("success", "Adicionado com sucesso");
            return redirect()->back();
        }
        //se possui vinculo nao salva nada e pedi para selecionar outra pessoa
        $request->session()->flash("info", "Pessoa já adicionada");
        return redirect()->back();
    }

    public function destroygroup(Request $request, $id)
    {
        //pegar tenant
        $this->get_tenant();
        //id do grupo
        $value = $request->session()->get('group');
        //consultar vinculos com pessoas
        $group = People_Groups::find($id);
        if ($group) {
            //deletar
            $group->delete();
            //consultar a somatoria do grupo novamente
            $adicionarsoma = Group::find($value);
            $adicionarsoma->count = $adicionarsoma->count - 1;
            $adicionarsoma->save();
            //adicionar log
            $this->adicionar_log('12', 'D', $group);
        }
        session()->flash("warning", "Deletada a pessoa do grupo");
        return redirect()->back();
    }
}
