<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumbersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('numbers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('number');
			$table->integer('assigned_id')->unsigned();
			$table->string('assigned_type');
			$table->timestamps();
			$table->unique(['number', 'assigned_id', 'assigned_type']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('numbers');
	}

}
