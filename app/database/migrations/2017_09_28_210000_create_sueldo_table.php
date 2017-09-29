<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSueldoTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("sueldos", function(Blueprint $table) {
            $table->increments("id");
            $table->string('sueldo');
            $table->string('career_id');
            $table->string('anio_id');
            $table->string('genero_id');
            $table->string('region_id');
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
        Schema::dropIfExists("sueldos");
    }

}