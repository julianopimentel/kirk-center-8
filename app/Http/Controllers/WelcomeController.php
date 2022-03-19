<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Newsletter\NewsletterFacade as Newsletter;


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
        } else
            $results = Blog::orderby('id', 'desc')->limit(3)->get();
        return view('site.welcome', ['results' => $results]);
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
        $results = Blog::orderby('id', 'desc')
            ->paginate(6);
        return view('site.blog.blog', ['results' => $results]);
    }

    public function adicionarnewsletter(Request $request)
    {
        if (!Newsletter::isSubscribed($request->user_email)) {
            Newsletter::subscribe($request->user_email);
            $request->session()->flash("success", 'Cadastrado com sucesso');
            return redirect()->back();
        } else
            $request->session()->flash("info", 'Erro interno');
        return redirect()->back();
    }
    //tela para se remover do newsletter
    public function removenewsletter()
    {
        return view('site.removenewsletter');
    }

    public function deletenewsletter(Request $request)
    {
        if (Newsletter::isSubscribed($request->user_email)) {
            Newsletter::unsubscribe($request->user_email);
            $request->session()->flash("warning", 'Removido com sucesso');
            return redirect()->route('welcome');
        } else
            $request->session()->flash("info", 'E-mail não encontrado');
        return redirect()->back();
    }
}
