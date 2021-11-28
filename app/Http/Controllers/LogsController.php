<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;

class LogsController extends Controller
{
    private $totalPagesPaginate = 12;
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
    public function index(Auditoria $auditoria)
    {
        $this->get_tenant();
        //consulta da auditoria
        $peoples = Auditoria::orderBy('id', 'desc')->with('status_log')->with('user')->paginate($this->totalPagesPaginate);
        //carregar os tipos da auditoria
        $types = $auditoria->type();  
        return view('logs.index', compact('peoples', 'types'));
    }
}
