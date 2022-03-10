<?php

namespace App\Http\Controllers;

use App\Models\Config_system;
use App\Models\Country;
use App\Models\Institution;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\People;
use App\Models\People_Aud;
use App\Models\Roles;
use App\Models\State;
use App\Models\User;
use App\Models\People_Notes;

class Peoples_VisitController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //pegar o tenant
        $this->get_tenant();
        //status
        //$statuses = Status::all()->where("type", 'people');
        //campos obrigatório
        $campo = Config_system::find('1')->first();
        //roles 
        //$roles = Roles::all();
        //localidade normal
        //$countries = Country::get(["name", "id"]);

        return view('people.createVisitForm', compact('campo'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->all([
            'name'             => 'required|min:1|max:255',
        ]);

        $people = new People();
        $nome = ($request->input('name') . ' ' . $request->input('last_name'));
        $people->name          = $nome;
        $people->email         = $request->input('email');
        $people->phone        = $request->input('phone_full');
        $people->birth_at      = $request->input('birth_at');
        $people->address       = $request->input('address');
        $people->city          = $request->input('city-dd');
        $people->state          = $request->input('state-dd');
        $people->cep           = $request->input('cep');
        $people->country       = $request->input('country-dd');
        $people->status_id = '14'; //ativo
        $people->is_verify       = 'false';
        $people->sex       = $request->input('sex');
        $people->is_newvisitor = 'true';
        //consultar e-mail duplicado
        $validaremail = People::where('email', $people->email)->get();
        if ($validaremail->count() >= 1 and  $people->email == !null) {
            $request->session()->flash("info", 'Email duplicado.');
            return redirect()->back();
        } else
            $people->save();
        //adicionar auditoria
        People_Aud::create([
            'id' => $people->id,
            'name' => $people->name,
            'email' => $people->email,
            'phone' => $people->phone,
            'birth_at' => $people->birth_at,
            'address' => $people->address,
            'city' => $people->city,
            'state' => $people->state,
            'cep' => $people->cep,
            'country' => $people->country,
            'status_id' => $people->status_id,
            'is_visitor' => $people->is_visitor,
            'is_verify' => $people->is_verify,
            'sex' => $people->sex,
            'is_newvisitor' => $people->is_newvisitor,
        ]);

        $request->session()->flash("success", __('general.people') . __('action.creat'));
        return redirect()->back();
    }
}
