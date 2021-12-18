<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class ConfigSocial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tenant')->create('config_social', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('facebook_link')->nullable();
			$table->string('twitter_link')->nullable();
			$table->string('google_link')->nullable();
			$table->string('youtube_link')->nullable();
			$table->string('linkedin_link')->nullable();
			$table->string('instagram_link')->nullable();
            $table->string('vk_link')->nullable();
            $table->string('site_link')->nullable();
            $table->string('whatsapp_link')->nullable();
            $table->string('telegram_link')->nullable();
			$table->timestamps(10);
		});
    }
}