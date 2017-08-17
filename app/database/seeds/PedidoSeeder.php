<?php

class PedidoSeeder extends DatabaseSeeder
{
    public function run()
    {
        EstadoPedido::create(['nombre'=>'Pendiente','color'=>'#EFFF12']);
        EstadoPedido::create(['nombre'=>'Iniciado','color'=>'#7fff00']);
        EstadoPedido::create(['nombre'=>'No Realizado','color'=>'#add8e6']);
        EstadoPedido::create(['nombre'=>'Completado','color'=>'#9BB6C2']);
        EstadoPedido::create(['nombre'=>'Cancelado','color'=>'#80FF80']);
        EstadoPedido::create(['nombre'=>'Suspendido','color'=>'#ABFFBC']);
        EstadoPedido::create(['nombre'=>'Eliminado','color'=>'#']);
        $pedido= [
            //'nombre' => '',
            'estado_pedidos_id' => 1,
            'mesa_id' => 1,
            'user_id' => 1
        ];
        for ($i=1; $i < 10 ; $i++) {
            Pedido::create($pedido);
        }
        for ($i=1; $i < 10 ; $i++) {
            $pedido['mesa_id'] = 2;
            Pedido::create($pedido);
        }
        for ($i=1; $i < 10 ; $i++) {
            $pedido['mesa_id'] = 3;
            Pedido::create($pedido);
        }
        for ($i=1; $i < 10 ; $i++) {
            $pedido['mesa_id'] = 4;
            Pedido::create($pedido);
        }
    }
}