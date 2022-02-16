<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class PeoplePrecadastro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::connection('tenant')->create('people_precadastro', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->integer('user_id')->nullable();
			$table->string('name');
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->date('birth_at')->nullable();
            $table->string('sex', 1)->nullable();
			$table->string('address')->nullable();
            $table->string('cep', 10)->nullable();
			$table->string('country')->nullable();
			$table->string('state')->nullable();
			$table->string('city')->nullable();
            $table->string('role')->nullable()->default(1);
			$table->string('note')->nullable();
            $table->integer('status_id');
			$table->boolean('is_verify')->nullable()->default(1);
            $table->timestamps(10);
		});
	}
}
