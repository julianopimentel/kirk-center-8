<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RequestsPrayer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tenant')->create('requests_prayer', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->integer('user_id');
            $table->string('title');
			$table->text('content');
            $table->string('note_type')->nullable();
            $table->boolean('public')->nullable()->default(1);
			$table->integer('status_id');
            $table->timestamps(10);
        });
    }
}
