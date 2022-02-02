<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sermons extends Migration
{
    public function up()
    {
        Schema::connection('tenant')->create('sermons', function (Blueprint $table) {
            $table->id();
            $table->text('title');
			$table->text('content');
            $table->string('image')->nullable();
			$table->string('type')->nullable();
			$table->date('applies_to_date');
            $table->integer('users_id');
            $table->string('roles')->nullable();
            $table->timestamps(10);
			$table->softDeletes('deleted_at')->nullable();
        });
    }
}