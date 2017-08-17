<?php

class TrabajadorSeeder extends DatabaseSeeder
{
    public function run()
    {
        $trabajador =[
            'nombres' => 'juan rojas',
            'celular' => '964142677',
            'dni' => '12345678',
            'EmployeeNumber' => '667'
        ];
        Trabajador::create($trabajador);
    }
}