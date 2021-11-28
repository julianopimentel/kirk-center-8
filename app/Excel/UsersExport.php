<?php
  
namespace App\Excel;

use App\Models\People;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Config;

  
class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        Config::set('database.connections.tenant.schema', session()->get('conexao')); 
        return People::all();
    }
}