<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tenant')->create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('body');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }
}
