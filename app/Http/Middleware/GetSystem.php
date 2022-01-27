<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Config_system;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;


class GetSystem
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        //validar o tenant, se nao tive retornar para o inicio
        if ((session()->get('schema')) === null){
            return redirect()->route('account.index')->withErrors(['error' => __('Please select an account to continue')]);
        }
        //setar tenant
        Config::set('database.connections.tenant.schema', session()->get('conexao'));

        //pegar permissao do grupo
        $system = Config_system::find('1')->first();

        //setar a linguagem
        App::setLocale($system->default_language);

        //retorno como apppermissao
        view()->share('appSystem', $system);
        return $next($request);
    }
}
