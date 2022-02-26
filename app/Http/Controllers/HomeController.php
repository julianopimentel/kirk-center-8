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
use App\Models\EventConfirm;
use App\Models\Statistics;

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
        $this->middleware('system');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Historic $historic, Request $request)
    {
        //dados do usuario
        $you = auth()->user();
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
        //analise de visita
        $validacao = Statistics::where('people_id', $you->people->id)
            ->where('type', 'acess')
            ->where('created_at', 'LIKE', '%' . date('Y-m-d') . '%')
            ->count();
        if ($validacao == 0) {
            Statistics::create([
                'people_id' => $you->people->id,
                'type' => 'acess',
            ]);
        }

        //numero de pessoas ativas e no ano atual
        $precadastro = People_Precadastro::select('status_id')->where('status_id', '21')->count();;

        //eventos para listar depois
        $eventos = Event::select('created_at')->whereYear('created_at', date('Y'))->count();
        //recado para listar depois
        $message = Notes::select('created_at')->whereYear('created_at', date('Y'))->count();
        //links das redes sociais
        $social = Config_social::first();

        //dash de status das pessoas
        $people = People::select('is_admin', 'is_visitor', 'is_baptism', 'is_conversion');
        $peopleativo = $people->where('is_admin', false)->count();
        $totalvisitas = $people->where('is_visitor', true)->count();
        $totalbatismo = $people->where('is_baptism', true)->count();
        $totalconversao = $people->where('is_conversion', true)->count();
        //total de visitas na página
        $totalvisitas = Statistics::where('type', 'acess')
        // se for pelo o ano ->where('created_at', 'LIKE', '%' . date('Y') . '%')
        ->count();

        //consulta para a meta do mÊs atual do grafico
        $date = date('Y-m');
        $dizimoatual = Historic::select('tipo', 'date', 'amount')->where('tipo', '9')->where('date', 'like', "%$date%")->sum('amount');
        $ofertaatual = Historic::select('tipo', 'date', 'amount')->where('tipo', '10')->where('date', 'like', "%$date%")->sum('amount');
        $doacaoatual = Historic::select('tipo', 'date', 'amount')->where('tipo', '11')->where('date', 'like', "%$date%")->sum('amount');
        $despesaatual = Historic::select('tipo', 'date', 'amount')->where('tipo', '12')->where('date', 'like', "%$date%")->sum('amount');

        //porcentagem no grafico do mês atual + porcentagem da meta mes
        $porcentage_dizimo = $this->porcentagem_nx($dizimoatual, $meta->fin_dizimo_mes); // 20
        $porcentage_oferta = $this->porcentagem_nx($ofertaatual, $meta->fin_oferta_mes);
        $porcentage_doacao = $this->porcentagem_nx($doacaoatual, $meta->fin_acao_mes); // 20
        $porcentage_despesa = $this->porcentagem_nx($despesaatual, $meta->fin_despesa_mes);

        //carregar dados de localização da conta
        $locations = Institution::select('lat', 'lng')->find(session()->get('key'));

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
                'peopleativo',
                'totalvisitas',
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
        //dados do usuario
        $you = auth()->user();
        //consulta da message
        $prayers = Requests_Prayer::with('user')->with('status')->where('user_id', $you->id)->orderby('id', 'desc')->paginate(20);
        return view('oracao', ['prayers' => $prayers]);
    }
    public function indexEventos()
    {
        $you = auth()->user();
        //consulta de eventos
        $eventos = Event::orderby('start', 'desc')->where('status', true)->get();
        //resultados confirmados
        $eventos_confirm = EventConfirm::with('eventoorigem')->where('people_id', $you->people->id)->orderby('created_at', 'desc')->get();
        return view('eventos', ['eventos' => $eventos, 'eventos_confirm' => $eventos_confirm]);
    }
}
