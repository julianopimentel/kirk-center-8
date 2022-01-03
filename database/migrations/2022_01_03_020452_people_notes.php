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
        Schema::connection('tenant')->create('people_notes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('event_id');
            $table->timestamps();
        });
    }
}