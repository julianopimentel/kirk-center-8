<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Menurole;
use App\Models\RoleHierarchy;
use App\Models\Roles;

class RolesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pegar o tenant
        $this->get_tenant();
        $roles = Roles::all();
        return view('settings.roles.index', array(
            'roles' => $roles,
        ));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //pegar tenant
        $this->get_tenant();
        $role = new Roles();
        $role->name       = $request->input('name');
        //pessoa
        $role->edit_people       = $request->has('edit_people') ? 1 : 0;
        $role->view_people       = $request->has('view_people') ? 1 : 0;
        $role->add_people       = $request->has('add_people') ? 1 : 0;
        $role->delete_people       = $request->has('delete_people') ? 1 : 0;
        //precadastro
        $role->edit_precadastro       = $request->has('edit_precadastro') ? 1 : 0;
        $role->view_precadastro       = $request->has('view_precadastro') ? 1 : 0;
        //grupo
        $role->add_group       = $request->has('add_group') ? 1 : 0;
        $role->edit_group       = $request->has('edit_group') ? 1 : 0;
        $role->view_group       = $request->has('view_group') ? 1 : 0;
        $role->delete_group       = $request->has('delete_group') ? 1 : 0;
        //grupo x pessoas
        $role->add_group_people      = $request->has('add_group_people') ? 1 : 0;
        $role->delete_group_people      = $request->has('delete_group_people') ? 1 : 0;
        //recado
        $role->add_message       = $request->has('add_message') ? 1 : 0;
        $role->edit_message       = $request->has('edit_message') ? 1 : 0;
        $role->view_message       = $request->has('view_message') ? 1 : 0;
        $role->delete_message       = $request->has('delete_message') ? 1 : 0;
        //financeiro
        $role->add_entrada_financial       = $request->has('add_entrada_financial') ? 1 : 0;
        $role->add_retirada_financial       = $request->has('add_retirada_financial') ? 1 : 0;
        $role->edit_financial       = $request->has('edit_financial') ? 1 : 0;
        $role->view_financial       = $request->has('view_financial') ? 1 : 0;
        $role->delete_financial       = $request->has('delete_financial') ? 1 : 0;
        //calendar
        $role->add_calendar       = $request->has('add_calendar') ? 1 : 0;
        $role->edit_calendar       = $request->has('edit_calendar') ? 1 : 0;
        $role->view_calendar       = $request->has('view_calendar') ? 1 : 0;
        $role->delete_calendar       = $request->has('delete_calendar') ? 1 : 0;
        //oracao
        $role->add_prayer       = $request->has('add_prayer') ? 1 : 0;
        $role->edit_prayer       = $request->has('edit_prayer') ? 1 : 0;
        $role->view_prayer       = $request->has('view_prayer') ? 1 : 0;
        $role->delete_prayer       = $request->has('delete_prayer') ? 1 : 0;
        //media
        $role->add_media       = $request->has('add_media') ? 1 : 0;
        $role->edit_media       = $request->has('edit_media') ? 1 : 0;
        $role->view_media       = $request->has('view_media') ? 1 : 0;
        $role->delete_media       = $request->has('delete_media') ? 1 : 0;
        //settings
        $role->settings_general       = $request->has('settings_general') ? 1 : 0;
        $role->settings_email       = $request->has('settings_email') ? 1 : 0;
        $role->settings_meta       = $request->has('settings_meta') ? 1 : 0;
        $role->settings_social       = $request->has('settings_social') ? 1 : 0;
        $role->settings_roles       = $request->has('settings_roles') ? 1 : 0;
        //dash
        $role->view_periodo       = $request->has('view_periodo') ? 1 : 0;
        $role->view_dash       = $request->has('view_dash') ? 1 : 0;
        $role->view_detail       = $request->has('view_detail') ? 1 : 0;
        $role->view_resumo_financeiro       = $request->has('view_resumo_financeiro') ? 1 : 0;
        //home
        $role->home_grupo       = $request->has('home_grupo') ? 1 : 0;
        $role->home_financeiro       = $request->has('home_financeiro') ? 1 : 0;
        $role->home_social       = $request->has('home_social') ? 1 : 0;
        $role->home_financeiro_valores       = $request->has('home_financeiro_valores') ? 1 : 0;
        $role->home_location       = $request->has('home_location') ? 1 : 0;
        $role->home_message       = $request->has('home_message') ? 1 : 0;
        $role->home_dados       = $request->has('home_dados') ? 1 : 0;
        $role->home_oracao       = $request->has('home_oracao') ? 1 : 0;
        //relatorio
        $role->report_view       = $request->has('report_view') ? 1 : 0;
        $role->save();
        //adicionar log
        $this->adicionar_log('13', 'C', $role);
        $request->session()->flash("success", "Successfully updated");
        return redirect()->route('roles.index');
    }
    /**
     * 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //pegar tenant
        $this->get_tenant();
        $role = Roles::find($id);
        return view('settings.roles.show', array(
            'role' => $role
        ));
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
        $role = Roles::find($id);
        return view('settings.roles.edit', array(
            'role' => $role
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //pegar tenant
        $this->get_tenant();
        $role = Roles::find($id);
        $role->name       = $request->input('name');
        //pessoa
        $role->edit_people       = $request->has('edit_people') ? 1 : 0;
        $role->view_people       = $request->has('view_people') ? 1 : 0;
        $role->add_people       = $request->has('add_people') ? 1 : 0;
        $role->delete_people       = $request->has('delete_people') ? 1 : 0;
        //precadastro
        $role->edit_precadastro       = $request->has('edit_precadastro') ? 1 : 0;
        $role->view_precadastro       = $request->has('view_precadastro') ? 1 : 0;
        //grupo
        $role->add_group       = $request->has('add_group') ? 1 : 0;
        $role->edit_group       = $request->has('edit_group') ? 1 : 0;
        $role->view_group       = $request->has('view_group') ? 1 : 0;
        $role->delete_group       = $request->has('delete_group') ? 1 : 0;
        //grupo x pessoas
        $role->add_group_people      = $request->has('add_group_people') ? 1 : 0;
        $role->delete_group_people      = $request->has('delete_group_people') ? 1 : 0;
        //recado
        $role->add_message       = $request->has('add_message') ? 1 : 0;
        $role->edit_message       = $request->has('edit_message') ? 1 : 0;
        $role->view_message       = $request->has('view_message') ? 1 : 0;
        $role->delete_message       = $request->has('delete_message') ? 1 : 0;
        //financeiro
        $role->add_entrada_financial       = $request->has('add_entrada_financial') ? 1 : 0;
        $role->add_retirada_financial       = $request->has('add_retirada_financial') ? 1 : 0;
        $role->edit_financial       = $request->has('edit_financial') ? 1 : 0;
        $role->view_financial       = $request->has('view_financial') ? 1 : 0;
        $role->delete_financial       = $request->has('delete_financial') ? 1 : 0;
        //calendar
        $role->add_calendar       = $request->has('add_calendar') ? 1 : 0;
        $role->edit_calendar       = $request->has('edit_calendar') ? 1 : 0;
        $role->view_calendar       = $request->has('view_calendar') ? 1 : 0;
        $role->delete_calendar       = $request->has('delete_calendar') ? 1 : 0;
        //oracao
        $role->add_prayer       = $request->has('add_prayer') ? 1 : 0;
        $role->edit_prayer       = $request->has('edit_prayer') ? 1 : 0;
        $role->view_prayer       = $request->has('view_prayer') ? 1 : 0;
        $role->delete_prayer       = $request->has('delete_prayer') ? 1 : 0;
        //media
        $role->add_media       = $request->has('add_media') ? 1 : 0;
        $role->edit_media       = $request->has('edit_media') ? 1 : 0;
        $role->view_media       = $request->has('view_media') ? 1 : 0;
        $role->delete_media       = $request->has('delete_media') ? 1 : 0;
        //settings
        $role->settings_general       = $request->has('settings_general') ? 1 : 0;
        $role->settings_email       = $request->has('settings_email') ? 1 : 0;
        $role->settings_meta       = $request->has('settings_meta') ? 1 : 0;
        $role->settings_social       = $request->has('settings_social') ? 1 : 0;
        $role->settings_roles       = $request->has('settings_roles') ? 1 : 0;
        //dash
        $role->view_periodo       = $request->has('view_periodo') ? 1 : 0;
        $role->view_dash       = $request->has('view_dash') ? 1 : 0;
        $role->view_detail       = $request->has('view_detail') ? 1 : 0;
        $role->view_resumo_financeiro       = $request->has('view_resumo_financeiro') ? 1 : 0;
        //home
        $role->home_grupo       = $request->has('home_grupo') ? 1 : 0;
        $role->home_financeiro       = $request->has('home_financeiro') ? 1 : 0;
        $role->home_social       = $request->has('home_social') ? 1 : 0;
        $role->home_financeiro_valores       = $request->has('home_financeiro_valores') ? 1 : 0;
        $role->home_location       = $request->has('home_location') ? 1 : 0;
        $role->home_message       = $request->has('home_message') ? 1 : 0;
        $role->home_dados       = $request->has('home_dados') ? 1 : 0;
        $role->home_oracao       = $request->has('home_oracao') ? 1 : 0;
        //relatorio
        $role->report_view       = $request->has('report_view') ? 1 : 0;
        $role->save();
        //adicionar log
        $this->adicionar_log('13', 'U', $role);
        $request->session()->flash("success", "Successfully updated");
        return redirect()->route('roles.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //pegar tenant
        $this->get_tenant();


        ////
        //// precisa criar filtro para não escluir os padroes
        ////


        $role = Role::where('id', '=', $id)->first();
        $roleHierarchy = RoleHierarchy::where('role_id', '=', $id)->first();
        $menuRole = Menurole::where('role_name', '=', $role->name)->first();
        if (!empty($menuRole)) {
            $request->session()->flash('message', "Can't delete. Role has assigned one or more menu elements.");
            $request->session()->flash('back', 'roles.index');
            return view('dashboard.shared.universal-info');
        } else {
            $role->delete();
            $roleHierarchy->delete();
            $request->session()->flash('message', "Successfully deleted role");
            $request->session()->flash('back', 'roles.index');
            return view('dashboard.shared.universal-info');
        }
    }
}
