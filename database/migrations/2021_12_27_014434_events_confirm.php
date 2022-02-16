<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventsConfirm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        error_log('Created table events_confirm');
        Schema::connection('tenant')->create('events_confirm', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('event_id');
            $table->timestamps();
        });
    }
}