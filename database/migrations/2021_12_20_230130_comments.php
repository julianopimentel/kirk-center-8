<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        error_log('Created table comments');
        Schema::connection('tenant')->create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('post_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('sermons_id')->nullable();
            $table->string('comment');
            $table->timestamps();
        });
    }
}
