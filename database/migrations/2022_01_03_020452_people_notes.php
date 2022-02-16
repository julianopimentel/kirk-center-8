<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PeopleNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        error_log('Created table people_notes');
        Schema::connection('tenant')->create('people_notes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('people_id');
            $table->text('notes');
            $table->timestamps();
        });
    }
}