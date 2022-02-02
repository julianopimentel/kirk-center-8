<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategorySermons extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::connection('tenant')->create('category_sermons', function (Blueprint $table) {
                $table->id();
                $table->text('title');
                $table->string('body')->nullable();
                $table->string('image')->nullable();
                $table->timestamps();
            });
        }
}
