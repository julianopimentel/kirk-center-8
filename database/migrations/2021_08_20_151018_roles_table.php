<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class RolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
        
		Schema::connection('tenant')->create('roles', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('name');
            //pessoa
			$table->boolean('add_people')->nullable()->default(0);
			$table->boolean('edit_people')->nullable()->default(0);
            $table->boolean('view_people')->nullable()->default(0);
            $table->boolean('delete_people')->nullable()->default(0);

            //precadastro
            $table->boolean('edit_precadastro')->nullable()->default(0);
            $table->boolean('view_precadastro')->nullable()->default(0);

            //grupo
			$table->boolean('add_group')->nullable()->default(0);
            $table->boolean('add_group_people')->nullable()->default(0);
            $table->boolean('edit_group')->nullable()->default(0);
            $table->boolean('view_group')->nullable()->default(0);
            $table->boolean('delete_group')->nullable()->default(0);
            $table->boolean('delete_group_people')->nullable()->default(0);

            //recado
			$table->boolean('add_message')->nullable()->default(0);
            $table->boolean('edit_message')->nullable()->default(0);
            $table->boolean('view_message')->nullable()->default(0);
            $table->boolean('delete_message')->nullable()->default(0);

            //financeiro
			$table->boolean('add_entrada_financial')->nullable()->default(0);
            $table->boolean('add_retirada_financial')->nullable()->default(0);
            $table->boolean('edit_financial')->nullable()->default(0);
            $table->boolean('view_financial')->nullable()->default(0);
            $table->boolean('delete_financial')->nullable()->default(0);

            //calendar
            $table->boolean('add_calendar')->nullable()->default(0);
            $table->boolean('edit_calendar')->nullable()->default(0);
            $table->boolean('view_calendar')->nullable()->default(0);
			$table->boolean('delete_calendar')->nullable()->default(0);

            //home
            $table->boolean('home_financeiro')->nullable()->default(0);
            $table->boolean('home_financeiro_valores')->nullable()->default(0);
            $table->boolean('home_grupo')->nullable()->default(0);
            $table->boolean('home_social')->nullable()->default(0);
            $table->boolean('home_location')->nullable()->default(0);
            $table->boolean('home_message')->nullable()->default(0);

            //dash
            $table->boolean('view_periodo')->nullable()->default(0);
			$table->boolean('view_dash')->nullable()->default(0);
			$table->boolean('view_detail')->nullable()->default(0);
			$table->boolean('view_resumo_financeiro')->nullable()->default(0);

            //settings
            $table->boolean('settings_general')->nullable()->default(0);
			$table->boolean('settings_email')->nullable()->default(0);
			$table->boolean('settings_meta')->nullable()->default(0);
			$table->boolean('settings_social')->nullable()->default(0);
            $table->boolean('settings_roles')->nullable()->default(0);
            //relatorio
            $table->boolean('report_view')->nullable()->default(0);

			$table->timestamps(10);
		});
	}
}
