<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class eventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('tenant')->create('events', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('title');
			$table->timestamps('start');
			$table->timestamps('end');
            $table->integer('user_id')->nullable();
			$table->timestamps(10);
			$table->softDeletes('deleted_at')->nullable();
		});
	}
}
