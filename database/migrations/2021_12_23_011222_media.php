<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Media extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        error_log('Created table media');
        Schema::connection('tenant')->create('media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model_type')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->uuid('uuid')->nullable();
            $table->string('collection_name')->nullable();
            $table->string('name')->nullable();
            $table->string('file_name')->nullable();
            $table->string('mime_type');
            $table->string('disk')->nullable();
            $table->string('conversions_disk')->nullable();
            $table->unsignedBigInteger('size')->nullable();
            $table->json('manipulations')->nullable();
            $table->json('custom_properties')->nullable();
            $table->json('generated_conversions')->nullable();
            $table->json('responsive_images')->nullable();
            $table->unsignedInteger('order_column')->nullable();
            $table->nullableTimestamps();
        });
    }
}
