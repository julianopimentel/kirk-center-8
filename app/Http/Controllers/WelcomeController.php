<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome(Request $request)
    {
        if (Auth()->check()) {
            //se nao selecionou a conta retornar para a selecao da conta
            if (($request->session()->get('key')) === null)
                return redirect()->route('account.index');
            else
            if ($this->middleware('user')) {
                return redirect()->route('home.index');
            } else
                //se tiver, volta para a tela do home
                return redirect()->route('login');
        }
        else
        return view('site.welcome');
    }

    public function terms()
    {
        return view('site.terms');
    }
    public function privacy()
    {
        return view('site.privacy');
    }
    public function contato()
    {
        return view('site.contato');
    }
    public function features()
    {
        return view('site.features');
    }
    public function blog()
    {
        return view('site.blog');
    }
}
