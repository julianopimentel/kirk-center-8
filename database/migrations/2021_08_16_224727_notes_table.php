<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class notesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('tenant')->create('message', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('title');
			$table->text('content');
			$table->string('note_type')->nullable();
			$table->date('applies_to_date');
			$table->string('image')->nullable();
			$table->integer('users_id');
			$table->integer('status_id');
            $table->timestamps(10);
			$table->softDeletes('deleted_at')->nullable();
		});
	}
}
