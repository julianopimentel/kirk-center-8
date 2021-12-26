<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;


class BaseSeeder extends Seeder
{
    protected $connection = 'tenant';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('config_system')->insert([
            'timezone' => 'America/SaoPaulo',
            'currency' => 'R$',
            'obg_last_name' => '1',
        ]);

        DB::table('config_meta')->insert([
            'ano' => date('Y'),
        ]);

        DB::table('config_email')->insert([
            'created_at' => date('Y/m/d'),
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin',
            'add_people' => '1',
            'edit_people' => '1',
            'view_people' => '1',
            'delete_people' => '1',
            //precadastro
            'edit_precadastro' => '1',
            'view_precadastro' => '1',
            //grupo
            'add_group' => '1',
            'add_group_people' => '1',
            'edit_group' => '1',
            'view_group' => '1',
            'delete_group' => '1',
            'delete_group_people' => '1',
            //recado
            'add_message' => '1',
            'edit_message' => '1',
            'view_message' => '1',
            'delete_message' => '1',
            //financeiro
            'add_entrada_financial' => '1',
            'add_retirada_financial' => '1',
            'edit_financial' => '1',
            'view_financial' => '1',
            'delete_financial' => '1',
            //calendar
            'add_calendar' => '1',
            'edit_calendar' => '1',
            'view_calendar' => '1',
            'delete_calendar' => '1',
            //oracao
            'add_prayer' => '1',
            'edit_prayer' => '1',
            'view_prayer' => '1',
            'delete_prayer' => '1',
            //media
            'add_media' => '1',
            'edit_media' => '1',
            'view_media' => '1',
            'delete_media' => '1',
            //home
            'home_financeiro' => '1',
            'home_social' => '1',
            'home_location' => '1',
            'home_message' => '1',
            //dash
            'view_periodo' => '1',
            'view_dash' => '1',
            'view_detail' => '1',
            'view_resumo_financeiro' => '1',
            //settings
            'settings_general' => '1',
            'settings_email' => '1',
            'settings_meta' => '1',
            'settings_social' => '1',
            'settings_roles' => '1',
            //report
            'report_view' => '1',
        ]);

        DB::table('roles')->insert([
            'name' => 'Membro',
            //home
            'home_financeiro_valores' => '1',
            'home_grupo' => '1',
            'home_social' => '1',
            'home_location' => '1',
            'home_message' => '1',
            'home_dados' => '1',
            'home_oracao' => '1',
            //adicionar oracao
            'add_prayer' => '1',
        ]);
        DB::table('roles')->insert([
            'name' => 'Financeiro',
            //home
            'home_financeiro' => '1',
            'home_message' => '1',
            //financeiro
            'add_entrada_financial' => '1',
            'add_retirada_financial' => '1',
            'edit_financial' => '1',
            'view_financial' => '1',
            'delete_financial' => '1',
        ]);
        DB::table('roles')->insert([
            'name' => 'Secretaria',
            'add_people' => '1',
            'edit_people' => '1',
            'view_people' => '1',
            'delete_people' => '1',
            //precadastro
            'edit_precadastro' => '1',
            'view_precadastro' => '1',
            //grupo
            'add_group' => '1',
            'add_group_people' => '1',
            'edit_group' => '1',
            'view_group' => '1',
            'delete_group' => '1',
            'delete_group_people' => '1',
            //recado
            'add_message' => '1',
            'edit_message' => '1',
            'view_message' => '1',
            'delete_message' => '1',
            //oracao
            'add_prayer' => '1',
            'edit_prayer' => '1',
            'view_prayer' => '1',
            'delete_prayer' => '1',
            //media
            'add_media' => '1',
            'edit_media' => '1',
            'view_media' => '1',
            'delete_media' => '1',
            //home
            'home_financeiro' => '1',
            'home_message' => '1',
        ]);

        DB::table('config_social')->insert([
            'created_at' => date('Y/m/d'),
        ]);

        DB::table('folder')->insert([
            'name' => 'root',
            'resource' => '1',
        ]);
    }
}
