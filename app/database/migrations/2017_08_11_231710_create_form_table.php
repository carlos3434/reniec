<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('formularios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Form',50)->nullable();
            $table->string('Version',50)->nullable();
            $table->string('Fields',50)->nullable();
            $table->string('EntryDate',50)->nullable();
            $table->string('Data',50)->nullable();
            $table->string('EventDate',50)->nullable();
            $table->string('EntryType',50)->nullable();
            $table->string('EntrySource',50)->nullable();
            $table->string('X',50)->nullable();
            $table->string('Y',50)->nullable();
            $table->string('Address',50)->nullable();
            $table->string('MSISDN',50)->nullable();
            $table->string('Date',50)->nullable();
            $table->string('DateAge',50)->nullable();
            $table->string('DateFromEpoch',50)->nullable();
            $table->string('TaskNumber',50)->nullable();
            $table->string('Status',50)->nullable();
            $table->string('Description',50)->nullable();
            $table->string('CustomerName',50)->nullable();

            $table->string('Data2',50)->nullable();
            $table->string('Data3',50)->nullable();
            $table->string('Data4',50)->nullable();
            $table->string('Data6',50)->nullable();
            $table->string('Data7',50)->nullable();
            $table->string('Data8',50)->nullable();
            $table->string('Data9',50)->nullable();
            $table->string('Data10',50)->nullable();
            $table->string('Data11',50)->nullable();
            $table->string('Data13',50)->nullable();
            $table->string('Data14',50)->nullable();
            $table->string('Data15',50)->nullable();
            $table->string('Data16',50)->nullable();
            $table->string('Data17',50)->nullable();
            $table->string('Data19',50)->nullable();
            $table->string('Data21',50)->nullable();
            $table->string('Data23',50)->nullable();
            $table->string('Data24',50)->nullable();
            $table->string('Data25',50)->nullable();
            $table->string('Data28',50)->nullable();
            $table->string('Data30',50)->nullable();
            $table->string('StartDate',50)->nullable();
            $table->string('StartDateAge',50)->nullable();
            $table->string('FirstName',50)->nullable();
            $table->string('LastName',50)->nullable();
            $table->string('EmployeeNumber',50)->nullable();
            $table->string('GroupName',50)->nullable();


            $table->integer('movimiento_id')->unsigned();
            $table->foreign('movimiento_id')->references('id')->on('movimientos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('imagenes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url',50);

            $table->integer('formulario_id')->unsigned();
            $table->foreign('formulario_id')->references('id')->on('formularios')
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
    }
}
