<?php

namespace App\Http\Controllers;

use App\Models\API\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    // get all posts
    public function index($id)
    {

        Config::set('database.connections.tenant.schema', 'igreja_batista_sao_jose_sc_100004');

        return response([
            'people' => People::all()

        ], 200);
    }

        // get all posts
        public function show($tenant, $id)
        {
            //mater toda a sessao

            Config::set('database.connections.tenant.schema', $tenant);
    
            return response([
                'people' => People::find($id),
            ], 200);
        }
}
