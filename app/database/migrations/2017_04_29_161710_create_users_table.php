<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create("users", function(Blueprint $table) {
	        $table->increments("id");
	        $table->string('nombres');
	        $table->string('apellidos');
            $table->string('dni')->nullable();
            $table->string('direccion')->nullable();
            $table->string('numero_telefono')->nullable();
	        $table->string("username");
	        $table->string("password");
	        $table->date('fecha_nacimiento');
            $table->char('genero');
            $table->integer('group_id')->unsigned();
	        $table->string("email")->unique();
	        $table->boolean("verified");//verifico al momento de registrarse
	        $table->string("token")->nullable();//recuperacion de password email
	        $table->string("remember_token")->nullable();//token de login
	        $table->timestamps();
            $table->softDeletes();
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("users");
	}

}