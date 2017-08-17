<?php
use Carbon\Carbon;
class CalendarioSeeder extends DatabaseSeeder
{
    public function run()
    {
        $calendario= [
            'fecha'     => Carbon::now(),
            'feriado'   => 0
        ];
        $calendarioId = Calendario::create($calendario)->id;
        
        for ($i=1; $i < 12 ; $i++) {
            $estado = $i % 2;
            $mesa = [
                'calendario_id'  => $calendarioId,
                'plato_id'       =>  $i,
                'stock'         => '10',
                'precio'        => '20.00',
            ];
            CalendarioPlato::create($mesa);
        }
    }
}