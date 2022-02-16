<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Folder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        error_log('Created table folder');
        Schema::connection('tenant')->create('folder', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('folder_id')->unsigned()->nullable();
            $table->boolean('resource')->nullable();
        });
    }
}
