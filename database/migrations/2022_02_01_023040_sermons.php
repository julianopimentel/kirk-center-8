<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sermons extends Migration
{
    public function up()
    {
        error_log('Created table sermons');
        Schema::connection('tenant')->create('sermons', function (Blueprint $table) {
            $table->id();
            $table->text('title');
			$table->text('content');
            $table->text('url_video');
            $table->string('codigo_url')->nullable();
			$table->string('type')->nullable();
			$table->date('applies_to_date');
            $table->integer('users_id');
            $table->integer('status_id');
            $table->timestamps(10);
			$table->softDeletes('deleted_at')->nullable();
        });
    }
}