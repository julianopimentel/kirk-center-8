<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class APIPeopleController extends Controller
{
    // get all posts
    public function index($id)
    {

        Config::set('database.connections.tenant.schema', 'demo_100003');

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
