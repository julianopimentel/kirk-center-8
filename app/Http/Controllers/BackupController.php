<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Excel\UsersExport;
use App\Excel\UsersImport;
use App\Models\People;
use Maatwebsite\Excel\Facades\Excel;

class BackupController extends Controller
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

    //index
    public function index()
    {
        //validar se selecionou a conta
        $this->get_tenant();
        //pegar configurações 
        $people = People::where('is_admin', false)->count();
        //pagina
        return view('settings.backup', compact('people'));
    }

    //importar planilha
    public function backup()
    {
        return view('import');
    }

    //exportar planilha
    public function export(Request $request)
    {
        //exportar somente os dados de pessoas, todos os campos por enquanto
        return Excel::download(new UsersExport, 'backup.xlsx');
        $request->session()->flash("success", "Successfully export");
        return back();
    }


    public function import(Request $request)
    {
        //importar os campos de nome(maiusculo), email e mobile
        Excel::import(new UsersImport, request()->file('file'));
        if (request()->file('file') === null) {
            $request->session()->flash("info", "Erro import");
        }
        $request->session()->flash("success", "Successfully import");
        return back();
    }
}
