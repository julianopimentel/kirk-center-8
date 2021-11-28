<?php
  
namespace App\Excel;
  
use App\Models\People;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Config;

  
class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Config::set('database.connections.tenant.schema', session()->get('conexao')); 

        return new People([
            'name'     => strtoupper($row['name']),
            'email'    => $row['email'], 
            'mobile'    => $row['mobile'], 
            'role' => '2',
            'status_id' => '14',
            //'password' => Hash::make($row['password']),
        ]);
    }
}