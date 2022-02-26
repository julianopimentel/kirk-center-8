<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\People;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class GetPermission
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
        //dados de usuario
        $you = auth()->user();
        //validar o tenant, se nao tive retornar para o inicio
        if ((session()->get('key')) === null) {
            return redirect()->route('account.index')
                //->withErrors(['error' => __('Please select an account to continue')])
            ;
        }
        //setar tenant
        Config::set('database.connections.tenant.schema', session()->get('conexao'));
       
        //pegar permissao do grupo
        $roles = People::where('user_id', $you->id)->with('roleslocal')->first();
        if (Auth::user()->isAdmin() == true) {
            $roles = People::where('user_id', '1')->with('roleslocal')->first();
            view()->share('appPermissao', $roles->roleslocal);
            return $next($request);
        }
        //consultar dados do usuario local
        if ($roles == null or $you->people->status_id == '13') {
            //caso não possua acesso associado e grupo vinculado, retorna para selecionar a conta
            $request->session()->flash("info", "Você não possuiu permissão, por favor contactar administrador da conta");
            return redirect()->route('account.index');
        } else
            //retorno como apppermissao
            view()->share('appPermissao', $roles->roleslocal);
        return $next($request);
    }
}
