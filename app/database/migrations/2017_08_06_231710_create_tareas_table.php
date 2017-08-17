<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tipo_personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);

            $table->integer('tipo_persona_id')->unsigned();
            $table->foreign('tipo_persona_id')->references('id')->on('tipo_personas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tipo_tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->timestamps();
            $table->softDeletes();
        });
        //bloques de mesa
        Schema::create('estado_tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TaskNumber',50);
            $table->string('EmployeeNumber',50);
            $table->string('DueDate',50);
            $table->string('Duration',50);
            $table->string('Notes',50);
            $table->string('Description',50);
            $table->string('CustomerName',50);
            $table->string('Address',50);
            $table->string('coordx',50);
            $table->string('coordy',50);

            $table->integer('tipo_tarea_id')->unsigned();
            $table->foreign('tipo_tarea_id')->references('id')->on('tipo_tareas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('estado_tarea_id')->unsigned();
            $table->foreign('estado_tarea_id')->references('id')->on('estado_tareas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TaskNumber',50);
            $table->string('EmployeeNumber',50);
            $table->string('DueDate',50);
            $table->string('Duration',50);
            $table->string('Notes',50);
            $table->string('Description',50);
            $table->string('CustomerName',50);
            $table->string('Address',50);
            $table->string('coordx',50);//operador
            $table->string('coordy',50);//operador

            $table->integer('tipo_tarea_id')->unsigned();
            $table->foreign('tipo_tarea_id')->references('id')->on('tipo_tareas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('estado_tarea_id')->unsigned();
            $table->foreign('estado_tarea_id')->references('id')->on('estado_tareas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('tarea_id')->unsigned();
            $table->foreign('tarea_id')->references('id')->on('tareas')
                ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('tareas');
        Schema::dropIfExists('estado_tareas');
        Schema::dropIfExists('tipo_tareas');
        Schema::dropIfExists('personas');
        Schema::dropIfExists('tipo_personas');
    }
}
