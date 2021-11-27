<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class eventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(config::get('database.connections.tenant.schema').'.events', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('title');
			$table->string('description')->nullable();
			$table->string('img')->nullable();
			$table->date('start');
			$table->date('end');
            $table->integer('user_id')->nullable();
			$table->timestamps(10);
			$table->softDeletes('deleted_at')->nullable();
		});
	}
}
