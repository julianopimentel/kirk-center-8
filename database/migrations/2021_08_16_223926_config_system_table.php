<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConfigSystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tenant')->create('config_system', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('logo')->nullable();
			$table->string('favicon')->nullable();
			$table->string('name')->nullable();
			$table->string('timezone');
			$table->string('default_language')->nullable();
			$table->string('currency')->nullable();
            $table->boolean('geolocation')->nullable()->default(0);
            $table->boolean('obg_last_name')->nullable()->default(1);
            $table->boolean('obg_email')->nullable()->default(0);
            $table->boolean('obg_mobile')->nullable()->default(0);
            $table->boolean('obg_birth')->nullable()->default(0);
            $table->boolean('obg_sex')->nullable()->default(0);
            $table->boolean('obg_city')->nullable()->default(0);
            $table->boolean('obg_state')->nullable()->default(0);
            $table->boolean('obg_note')->nullable()->default(0);
			$table->timestamps(10);
		});
    }
}
