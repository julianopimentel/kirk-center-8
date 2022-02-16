<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        error_log('Created table balances');
        Schema::connection('tenant')->create('balances', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->integer('account_id');
			$table->float('amount', 10, 0)->default(0);
		});
    }
}
