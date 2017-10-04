<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSueldosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sueldos', function($table) {

			$table->increments('id');
			$table->integer('careerId')->unsigned();
			$table->foreign('careerId')->references('id')->on('careers');
			$table->integer('referenceYear');
			$table->integer('experienceYears');
			$table->integer('salary');
			$table->integer('quantity');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("sueldos");
	}

}
