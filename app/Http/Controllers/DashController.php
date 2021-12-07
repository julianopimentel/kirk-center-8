<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Notes;
use App\Models\Event;
use App\Models\Historic;
use App\Models\Config_meta;
use App\Models\People_Groups;
use App\Models\People_Precadastro;
use Overtrue\LaravelLike\Traits\Likeable;

class DashController extends Controller
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
    public function index(Request $request)
    {
        //pegar schema
        $this->get_tenant();
        //user data
        $you = auth()->user();

        //pegar informações complementares 

        //carregar a última meta inserida
        $meta = Config_meta::orderBy('id', 'desc')->first();

        //valor do ano interior par calculo
        $anoanterior = (date('Y') - '1');

        //consulta de pessoas
        $people = People::all();
        //consulta de financeiro
        $financeiro = Historic::all();

        //contagem total de pessoas por status para uso do gráfico
        $peopleativo = $people->where('is_admin',false)->count();
        $totalvisitante = $people->where('is_visitor', true)->count();
        $totalbatismo = $people->where('is_baptism', true)->count();
        $totalconversao = $people->where('is_conversion', true)->count();
        $sexmascu = $people->where('sex', 'm')->count();
        $sexfemin = $people->where('sex', 'f')->count();
        $totalsex = $people->where('sex')->count();
        //porcentagem pelo sexo de pessoas
        $porcentage_m = $this->porcentagem_nx($sexmascu, $totalsex);
        $porcentage_f = $this->porcentagem_nx($sexfemin, $totalsex);

        //contagem total da meta de pessoas do ano atual
        $anovisitante = People::where('is_visitor', true)->whereYear('created_at', date('Y'))->count();
        $anobatismo = People::where('is_baptism', true)->whereYear('created_at', date('Y'))->count();
        $anoconversao = People::where('is_conversion', true)->whereYear('created_at', date('Y'))->count();
        $anopessoa = People::whereYear('created_at', date('Y'))->count();
        $anogrupo = People_Groups::whereYear('registered', date('Y'))->count();

        //porcentagem por pessoas com status x meta anual
        $porcentage_visitante = $this->porcentagem_nx($anovisitante, $meta->visitante_ano);
        $porcentage_batismo = $this->porcentagem_nx($anobatismo, $meta->batismo_ano);
        $porcentage_conversao = $this->porcentagem_nx($anoconversao, $meta->conversao_ano);
        $porcentage_pessoa = $this->porcentagem_nx($anopessoa, $meta->pessoa_ano);
        $porcentage_grupo = $this->porcentagem_nx($anogrupo, $meta->grupo_ativo_ano);

        //soma de financeiro por tipo de movimento anual
        $anodizimo = Historic::where('tipo', '9')->whereYear('date', date('Y'))->sum('amount');
        $anooferta = Historic::where('tipo', '10')->whereYear('date', date('Y'))->sum('amount');
        $anodoacao = Historic::where('tipo', '11')->whereYear('date', date('Y'))->sum('amount');
        $anodespesa = Historic::where('tipo', '12')->whereYear('date', date('Y'))->sum('amount');
        //soma dos valores do financeiro
        $totalfinanceiro = ($anodizimo + $anooferta + $anodoacao + $anodespesa);

        //porcentagem do tipo de movimento x meta anual
        $porcentage_dizimo = $this->porcentagem_nx($anodizimo, $meta->fin_dizimo_ano); // 20
        $porcentage_oferta = $this->porcentagem_nx($anooferta, $meta->fin_oferta_ano);
        $porcentage_doacao = $this->porcentagem_nx($anodoacao, $meta->fin_acao_ano); // 20
        $porcentage_despesa = $this->porcentagem_nx($anodespesa, $meta->fin_despesa_ano);
        //porcentagem total da soma
        $totalporcentagem = ($porcentage_dizimo + $porcentage_oferta + $porcentage_doacao + $porcentage_despesa);
        //soma total
        $porcentage_total = $this->porcentagem_total($totalporcentagem);

        //contatem de novo visitante do ano
        $peoplevisitor = People::where('is_newvisitor', true)->whereYear('created_at', date('Y'))->count();
        //contatem do precadastro
        $precadastro = People_Precadastro::all()->count();;
        //contagem de calendarios do ano
        $eventos = Event::whereYear('created_at', date('Y'))->count();
        //contagem de message do ano
        $notes = Notes::whereYear('created_at', date('Y'))->count();


        //soma das metas anual /12
        $metadash = ($meta->first()->fin_dizimo_ano + $meta->first()->fin_oferta_ano + $meta->first()->fin_acao_ano + $meta->first()->fin_despesa_ano) / 12;
        //grafico grande do ano atual
        $fin_atual_jan = Historic::whereYear('date', date('Y'))->whereMonth('date', date('01'))->sum('amount');
        $fin_atual_fev = Historic::whereYear('date', date('Y'))->whereMonth('date', date('02'))->sum('amount');
        $fin_atual_mar = Historic::whereYear('date', date('Y'))->whereMonth('date', date('03'))->sum('amount');
        $fin_atual_abr = Historic::whereYear('date', date('Y'))->whereMonth('date', date('04'))->sum('amount');
        $fin_atual_mai = Historic::whereYear('date', date('Y'))->whereMonth('date', date('05'))->sum('amount');
        $fin_atual_jun = Historic::whereYear('date', date('Y'))->whereMonth('date', date('06'))->sum('amount');
        $fin_atual_jul = Historic::whereYear('date', date('Y'))->whereMonth('date', date('07'))->sum('amount');
        $fin_atual_ago = Historic::whereYear('date', date('Y'))->whereMonth('date', date('08'))->sum('amount');
        $fin_atual_set = Historic::whereYear('date', date('Y'))->whereMonth('date', date('09'))->sum('amount');
        $fin_atual_out = Historic::whereYear('date', date('Y'))->whereMonth('date', date('10'))->sum('amount');
        $fin_atual_nov = Historic::whereYear('date', date('Y'))->whereMonth('date', date('11'))->sum('amount');
        $fin_atual_dez = Historic::whereYear('date', date('Y'))->whereMonth('date', date('12'))->sum('amount');
        //grafico grande do ano anterior
        $fin_anterior_jan = Historic::whereYear('date', date($anoanterior))->whereMonth('date', date('01'))->sum('amount');
        $fin_anterior_fev = Historic::whereYear('date', date($anoanterior))->whereMonth('date', date('02'))->sum('amount');
        $fin_anterior_mar = Historic::whereYear('date', date($anoanterior))->whereMonth('date', date('03'))->sum('amount');
        $fin_anterior_abr = Historic::whereYear('date', date($anoanterior))->whereMonth('date', date('04'))->sum('amount');
        $fin_anterior_mai = Historic::whereYear('date', date($anoanterior))->whereMonth('date', date('05'))->sum('amount');
        $fin_anterior_jun = Historic::whereYear('date', date($anoanterior))->whereMonth('date', date('06'))->sum('amount');
        $fin_anterior_jul = Historic::whereYear('date', date($anoanterior))->whereMonth('date', date('07'))->sum('amount');
        $fin_anterior_ago = Historic::whereYear('date', date($anoanterior))->whereMonth('date', date('08'))->sum('amount');
        $fin_anterior_set = Historic::whereYear('date', date($anoanterior))->whereMonth('date', date('09'))->sum('amount');
        $fin_anterior_out = Historic::whereYear('date', date($anoanterior))->whereMonth('date', date('10'))->sum('amount');
        $fin_anterior_nov = Historic::whereYear('date', date($anoanterior))->whereMonth('date', date('11'))->sum('amount');
        $fin_anterior_dez = Historic::whereYear('date', date($anoanterior))->whereMonth('date', date('12'))->sum('amount');

        //grafico financeiro do tipo de movimento do mês atual
        $date = date('Y-m');
        $dizimoatual = Historic::where('tipo', '9')->where('date', 'like', "%$date%")->sum('amount');
        $ofertaatual = Historic::where('tipo', '10')->where('date', 'like', "%$date%")->sum('amount');
        $doacaoatual = Historic::where('tipo', '11')->where('date', 'like', "%$date%")->sum('amount');
        $despesaatual = Historic::where('tipo', '12')->where('date', 'like', "%$date%")->sum('amount');

        //grafico financeiro da forma de pagamento do mês atual
        $formapag_dinheiro = Historic::where('pag', '15')->where('type', 'I')->where('date', 'like', "%$date%")->sum('amount');
        $formapag_cheque = Historic::where('pag', '16')->where('type', 'I')->where('date', 'like', "%$date%")->sum('amount');
        $formapag_credito = Historic::where('pag', '17')->where('type', 'I')->where('date', 'like', "%$date%")->sum('amount');
        $formapag_debito = Historic::where('pag', '18')->where('type', 'I')->where('date', 'like', "%$date%")->sum('amount');
        $formapag_boleto = Historic::where('pag', '19')->where('type', 'I')->where('date', 'like', "%$date%")->sum('amount');
        $formapag_pix = Historic::where('pag', '20')->where('type', 'I')->where('date', 'like', "%$date%")->sum('amount');

        return view(
            'dashboard.homepage',
            compact(
                'peopleativo',
                'peoplevisitor',
                'meta',
                'notes',
                'eventos',
                'totalvisitante',
                'sexmascu',
                'sexfemin',
                'totalsex',
                'porcentage_m',
                'porcentage_f',
                'anovisitante',
                'anobatismo',
                'anoconversao',
                'anopessoa',
                'formapag_dinheiro',
                'formapag_cheque',
                'formapag_credito',
                'formapag_debito',
                'formapag_boleto',
                'formapag_pix',
                'porcentage_visitante',
                'porcentage_batismo',
                'porcentage_conversao',
                'porcentage_pessoa',
                'anodizimo',
                'anooferta',
                'anodoacao',
                'anodespesa',
                'porcentage_dizimo',
                'porcentage_oferta',
                'porcentage_doacao',
                'porcentage_despesa',
                'porcentage_total',
                'totalfinanceiro',
                'totalbatismo',
                'totalconversao',
                'metadash',
                'fin_atual_jan',
                'fin_atual_fev',
                'fin_atual_mar',
                'fin_atual_abr',
                'fin_atual_mai',
                'fin_atual_jun',
                'fin_atual_jul',
                'fin_atual_ago',
                'fin_atual_set',
                'fin_atual_out',
                'fin_atual_nov',
                'fin_atual_dez',
                'fin_anterior_jan',
                'fin_anterior_fev',
                'fin_anterior_mar',
                'fin_anterior_abr',
                'fin_anterior_mai',
                'fin_anterior_jun',
                'fin_anterior_jul',
                'fin_anterior_ago',
                'fin_anterior_set',
                'fin_anterior_out',
                'fin_anterior_nov',
                'fin_anterior_dez',
                'dizimoatual',
                'ofertaatual',
                'doacaoatual',
                'despesaatual',
                'anogrupo',
                'porcentage_grupo',
                'precadastro'
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
    //somar a porcentagem x digidir em media
    function porcentagem_total($parcial)
    {
        return ($parcial / 5);
    }
}