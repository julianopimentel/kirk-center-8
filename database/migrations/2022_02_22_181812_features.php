<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Features extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
        error_log('Created table features');
		Schema::connection('tenant')->create('features', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->boolean('geolocation')->nullable()->default(0);
            $table->boolean('precadastro')->nullable()->default(0);
            $table->boolean('email_smtp')->nullable()->default(0);
            $table->boolean('financial')->nullable()->default(0);
            $table->boolean('message')->nullable()->default(0);
			$table->boolean('calendar')->nullable()->default(0);
            $table->boolean('group')->nullable()->default(0);
            $table->boolean('sermons')->nullable()->default(0);
            $table->boolean('media')->nullable()->default(0);
            $table->boolean('prayers')->nullable()->default(0);
            $table->boolean('comments')->nullable()->default(0);
            $table->boolean('envio_whatsapp')->nullable()->default(0);
            $table->string('user_id')->nullable();
			$table->timestamps(10);
		});
	}
}
