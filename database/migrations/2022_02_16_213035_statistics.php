<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Statistics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        error_log('Created table statistics');
        Schema::connection('tenant')->create('statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('type')->nullable();
            $table->integer('post_id');
            $table->integer('group_id');
            $table->integer('sermons_id');
            $table->json('manipulations')->nullable();
            $table->timestamps();
        });
    }
}
