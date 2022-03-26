<?php
 
namespace App\Http\Middleware;

use App\Models\Account_Integrador_Skin;
use Closure;
use Illuminate\Support\Facades\URL;
 
class SetDefaultLocaleForUrls
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, Closure $next)
    {
        $base = explode('.', $_SERVER['HTTP_HOST'])[0];
       // echo explode('.', url()->current())[0];
        $url_skin = Account_Integrador_Skin::where('dominio', $base)->first();
        if($url_skin == !null)
        {
         //   echo $url_skin;
            view()->share('appSkin', $url_skin);
            return $next($request);
        }
        else
        $url_skin = Account_Integrador_Skin::where('id', '1')->first();
      //  echo $url_skin;
        view()->share('appSkin', $url_skin);
        return $next($request);
    }
}