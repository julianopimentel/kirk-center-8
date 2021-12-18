<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;


class peopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::connection('tenant')->create('people', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->integer('user_id')->nullable();
			$table->string('name');
			$table->string('email')->nullable();
			$table->string('mobile')->nullable();
			$table->date('birth_at')->nullable();
            $table->string('sex', 1)->nullable();
			$table->string('address')->nullable();
            $table->string('cep', 10)->nullable();
			$table->string('country')->nullable();
			$table->string('state')->nullable();
			$table->string('city')->nullable();
			$table->string('lat')->nullable();
			$table->string('lng')->nullable();
            $table->string('role')->nullable()->default(2);
			$table->string('note')->nullable();
            $table->integer('status_id')->default(14);
			$table->boolean('is_verify')->nullable()->default(1);
			$table->boolean('is_visitor')->nullable()->default(0);
			$table->boolean('is_transferred')->nullable()->default(0);
			$table->boolean('is_responsible')->nullable()->default(0);
			$table->boolean('is_conversion')->nullable()->default(0);
			$table->boolean('is_baptism')->nullable()->default(0);
			$table->boolean('is_newvisitor')->nullable()->default(0);
			$table->boolean('is_admin')->nullable()->default(0);
			$table->string('image')->nullable();
            $table->timestamps(10);
			$table->softDeletes('deleted_at')->nullable();
		});
	}
}
