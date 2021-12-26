<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\Balance;
use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Notes;
use App\Models\Event;
use App\Models\Historic;
use App\Models\Config_meta;
use App\Models\Config_social;
use App\Models\Institution;
use App\Models\People_Groups;
use App\Models\People_Precadastro;
use App\Models\Requests_Prayer;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Historic $historic, Request $request)
    {
        //pegar schema
        $this->get_tenant();
        //dados do usuario
        $you = auth()->user();

        //consultar dados do usuario local
        $user = People::where('user_id', $you->id)->with('roleslocal')->first();
        if ($user == null) {
            //caso não possua acesso associado e grupo vinculado, retorna para selecionar a conta
            $request->session()->flash("info", "Você não possuiu permissão, por favor contactar administrador da conta");
            return redirect()->route('account.index');
        } else

            //pegar informações complementares 
            $meta = Config_meta::orderBy('id', 'desc')->first();
        $auditoria = Auditoria::orderBy('id', 'desc')->first();

        //se for o primeiro acesso da conta, vai inserir no log o primeiro acesso e adicionar a conta no financeiro
        if ($auditoria === null) {
            //primeiro acesso auditoria
            $auditoria = new Auditoria();
            $auditoria->activity_id       = '9';
            $auditoria->type       = 'C';
            $auditoria->user_id       = $you->id;
            $auditoria->manipulations       = '{"primeiro_acesso":"yes","ID":"' . $you->id . '"}';
            $auditoria->save();
            $request->session()->flash("info", "É necessário configurar a conta");

            //inserir valor do financeiro
            $balance = new Balance();
            $balance->account_id = session()->get('key');
            $balance->amount = '0';
            $balance->save();
        }

        //numero de pessoas ativas e no ano atual
        $precadastro = People_Precadastro::where('status_id', '21')->count();;

        //eventos para listar depois
        $eventos = Event::whereYear('created_at', date('Y'))->count();
        //recado para listar depois
        $message = Notes::whereYear('created_at', date('Y'))->count();
        //links das redes sociais
        $social = Config_social::find('1')->first();

        //dash de status das pessoas
        $people = People::all();
        $peopleativo = $people->where('is_admin', false)->count();
        $totalvisitante = $people->where('is_visitor', true)->count();
        $totalbatismo = $people->where('is_baptism', true)->count();
        $totalconversao = $people->where('is_conversion', true)->count();

        //consulta para a meta do mÊs atual do grafico
        $date = date('Y-m');
        $dizimoatual = Historic::where('tipo', '9')->where('date', 'like', "%$date%")->sum('amount');
        $ofertaatual = Historic::where('tipo', '10')->where('date', 'like', "%$date%")->sum('amount');
        $doacaoatual = Historic::where('tipo', '11')->where('date', 'like', "%$date%")->sum('amount');
        $despesaatual = Historic::where('tipo', '12')->where('date', 'like', "%$date%")->sum('amount');

        //porcentagem no grafico do mês atual + porcentagem da meta mes
        $porcentage_dizimo = $this->porcentagem_nx($dizimoatual, $meta->fin_dizimo_mes); // 20
        $porcentage_oferta = $this->porcentagem_nx($ofertaatual, $meta->fin_oferta_mes);
        $porcentage_doacao = $this->porcentagem_nx($doacaoatual, $meta->fin_acao_mes); // 20
        $porcentage_despesa = $this->porcentagem_nx($despesaatual, $meta->fin_despesa_mes);

        //carregar dados de localização da conta
        $locations = Institution::find(session()->get('key'));

        //carregamento as message com os dados do usuário que publicou + filtrado para o somente status "public"  
        $notes = Notes::with('user:name,profile_image')->with('status:name')->take(4)->orderby('applies_to_date', 'desc')->whereIn('status_id', [1, 2])->get();

        return view(
            'home',
            compact(
                'precadastro',
                'notes',
                'locations',
                'eventos',
                'message',
                'social',
                'you',
                'user',
                'peopleativo',
                'totalvisitante',
                'totalbatismo',
                'totalconversao',
                'dizimoatual',
                'ofertaatual',
                'doacaoatual',
                'despesaatual',
                'porcentage_dizimo',
                'porcentage_oferta',
                'porcentage_doacao',
                'porcentage_despesa',
            )
        );
    }
    //calcular porcentagem individual x total
    function porcentagem_nx($parcial, $total)
    {
        if ($total == 0) {
            $ratio = 0;
        } else {
            return ($parcial * 100) / $total;
        }
    }

    public function indexGrupos()
    {
        //pegar schema
        $this->get_tenant();
        //dados do usuario
        $you = auth()->user();
        //consultar dados do usuario local
        $user = People::where('user_id', $you->id)->with('roleslocal')->first();
        //carregar os meus grupos vinculados
        $groups = People_Groups::with('grupo')
            ->where('user_id', $user->id)->get();

        return view(
            'grupos',
            compact(
                'you',
                'user',
            ),
            ['groups' => $groups]
        );
    }

    public function indexDados()
    {
        //pegar schema
        $this->get_tenant();
        $you = auth()->user();
        //consulta
        $people = People::all()->where("user_id", $you->id)->first();

        //localidade normal
        $countries = Country::get(["name", "id"]);
        $state = State::get(["name", "id"]);
        $city = City::get(["name", "id"]);

        return view('dados', [
            'people' => $people,
            'countries' => $countries,
            'state' => $state,
            'city' => $city
        ]);
    }

    public function indexDizimos()
    {
        //pegar schema
        $this->get_tenant();
        //dados do usuario
        $you = auth()->user();

        //consultar dados do usuario local
        $user = People::where('user_id', $you->id)->with('roleslocal')->first();

        //carregar os meus dizimos
        $dizimos = Historic::with('seusdizimos')
            ->with('status')
            ->with('statuspag')
            ->where('type', 'I')
            ->orderBy('date', 'desc')
            ->where('user_id_transaction', $user->id)
            ->paginate('10');

        return view(
            'ofertas',
            compact(
                'you',
                'user',
            ),
            ['dizimos' => $dizimos]
        );
    }
    public function indexOracao()
    {
        //pegar tenant
        $this->get_tenant();
        //dados do usuario
        $you = auth()->user();
        //consulta da message
        $prayers = Requests_Prayer::with('user')->with('status')->where('user_id', $you->id)->paginate(20);
        return view('oracao', ['prayers' => $prayers]);
    }
}
