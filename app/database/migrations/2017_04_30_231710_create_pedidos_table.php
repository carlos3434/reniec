<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sedes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->timestamps();
            $table->softDeletes();
        });
        //bloques de mesa
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('mesas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('capacidad',2);
            $table->integer('estado')->default(1)->nullable();//disponible o no
            //grupo

            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('grupos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
        //
        Schema::create('estado_pedido_plato', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->timestamps();
            $table->softDeletes();
        });
        //
        Schema::create('tipo_platos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->timestamps();
            $table->softDeletes();
        });
        //menu o carta
        Schema::create('categoria_platos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('platos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            //$table->integer('estado')->default(1)->nullable();

            $table->integer('tipo_platos_id')->unsigned();
            $table->foreign('tipo_platos_id')->references('id')->on('tipo_platos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('categoria_platos_id')->unsigned();
            $table->foreign('categoria_platos_id')->references('id')->on('categoria_platos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('calendarios', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->boolean('feriado');
            $table->timestamps();
            $table->softDeletes();
        });

        // Create table for associating calendarios to platos (Many-to-Many)

        Schema::create('calendario_platos', function (Blueprint $table) {
            $table->integer('calendario_id')->unsigned();
            $table->integer('plato_id')->unsigned();
            $table->integer('stock');
            $table->decimal('precio');

            $table->foreign('calendario_id')->references('id')->on('calendarios')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('plato_id')->references('id')->on('platos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['calendario_id', 'plato_id']);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('estado_pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('color',50);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('nombre',50);

            $table->integer('estado_pedidos_id')->unsigned();
            $table->foreign('estado_pedidos_id')->references('id')->on('estado_pedidos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('mesa_id')->unsigned();
            $table->foreign('mesa_id')->references('id')->on('mesas')
                ->onUpdate('cascade')->onDelete('cascade');
            //moso
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
        //niño, adulto mayo,etc
        Schema::create('tipo_clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->timestamps();
            $table->softDeletes();
        });
        //pedido
        Schema::create('pedido_plato', function (Blueprint $table) {
            $table->increments('id');//PK
            $table->integer('estado_pedido_plato_id')->unsigned();
            $table->integer('pedido_id')->unsigned();
            $table->integer('plato_id')->unsigned();
            $table->string('observacion');

            $table->foreign('pedido_id')->references('id')->on('pedidos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('plato_id')->references('id')->on('platos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('estado_pedido_plato_id')->references('id')->on('estado_pedido_plato')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('tipo_clientes_id')->unsigned();
            $table->foreign('tipo_clientes_id')->references('id')->on('tipo_clientes')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['pedido_id', 'plato_id']);

            $table->timestamps();
            $table->softDeletes();
        });

        // Create table for associating sedes to users (Many-to-Many)
        Schema::create('sede_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('sede_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('sede_id')->references('id')->on('sedes')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'sede_id']);
            $table->softDeletes();
        });

        // Create table for associating grupos to users (Many-to-Many)
        Schema::create('grupo_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('grupo_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('grupo_id')->references('id')->on('grupos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'grupo_id']);
            $table->softDeletes();
        });

        //venta
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedidos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
        //cliente
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',150);
            $table->string('dni',10);
            $table->string('email',50);
            $table->string('facebook',50);
            $table->timestamps();
            $table->softDeletes();
        });
        //venta detalle
        Schema::create('venta_detalle', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('venta_id')->unsigned();
            $table->foreign('venta_id')->references('id')->on('ventas')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes')
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
        Schema::dropIfExists('venta_detalle');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('ventas');
        Schema::dropIfExists('grupo_user');
        Schema::dropIfExists('sede_user');
        Schema::dropIfExists('pedido_plato');
        Schema::dropIfExists('tipo_clientes');
        Schema::dropIfExists('pedidos');
        //Schema::dropIfExists('users');
        Schema::dropIfExists('estado_pedidos');
        Schema::dropIfExists('calendario_platos');
        Schema::dropIfExists('calendarios');
        Schema::dropIfExists('platos');
        Schema::dropIfExists('tipo_platos');
        Schema::dropIfExists('categoria_platos');
        Schema::dropIfExists('estado_pedido_plato');
        Schema::dropIfExists('mesas');
        Schema::dropIfExists('grupos');
        Schema::dropIfExists('sedes');
        
    }
}
