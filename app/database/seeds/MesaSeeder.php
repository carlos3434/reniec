<?php

class MesaSeeder extends DatabaseSeeder
{
    public function run()
    {
        $grupo= [
            'nombre' => 'San isidro'
        ];
        $grupoId = Grupo::create($grupo)->id;
        
        for ($i=1; $i < 10 ; $i++) {

            $estado = $i % 2;
            $mesa = [
                'nombre'    => 'Meza: '.$i,
                'capacidad' => '10',
                'estado'    => $estado,
                'grupo_id'  => $grupoId
            ];
            Mesa::create($mesa);
        }
    }
}