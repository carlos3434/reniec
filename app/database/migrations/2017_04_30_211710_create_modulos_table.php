<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('url',50);
            $table->string('icon',50);
            $table->integer('modulo_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Create table for associating modulos to users (Many-to-Many)
        /*
        Schema::create('modulo_user', function (Blueprint $table) {
            $table->integer('modulo_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('modulo_id')->references('id')->on('modulos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['modulo_id', 'user_id']);
            $table->softDeletes();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('modulo_user');
        Schema::dropIfExists('modulos');
    }
}
