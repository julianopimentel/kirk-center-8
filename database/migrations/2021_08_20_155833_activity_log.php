<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;


class ActivityLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create(config::get('database.connections.tenant.schema').'.activity_log', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('activity_id')->nullable();
            $table->string('type')->nullable();
			$table->string('user_id')->nullable();
			$table->json('manipulations')->nullable();
            $table->json('request')->nullable();
			$table->timestamps(10);
		});
    }
}
