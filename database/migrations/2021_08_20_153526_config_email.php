<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;


class ConfigEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tenant')->create('config_email', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('email_from')->nullable();
			$table->string('smtp_host')->nullable();
			$table->integer('smtp_port')->nullable();
			$table->string('smtp_user')->nullable();
			$table->string('smtp_pass')->nullable();
            $table->integer('smtp_security')->nullable();
			$table->timestamps(10);
		});
    }
}