<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;


class groupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::connection('tenant')->create('groups', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('name_group');
            $table->string('type', 64)->nullable();
            $table->smallInteger('count')->nullable()->default(0);
			$table->bigInteger('user_id')->nullable();
            $table->bigInteger('status_id')->nullable();
            $table->string('note')->nullable();
            $table->timestamps(10);
			$table->softDeletes('deleted_at')->nullable();
		});
	}
}
