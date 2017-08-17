<?php

class PlatoSeeder extends DatabaseSeeder
{
    public function run()
    {
        $entrada = TipoPlato::create(['nombre' => 'Entrada'])->id;
        $fondo = TipoPlato::create(['nombre' => 'Fondo'])->id;
        $sopa = TipoPlato::create(['nombre' => 'Sopa'])->id;
        $postre = TipoPlato::create(['nombre' => 'Postre'])->id;

        $menu = CategoriaPlato::create(['nombre' => 'Menu'])->id;
        $carta = CategoriaPlato::create(['nombre' => 'Carta'])->id;

        Plato::create(['nombre'=>'ensalada de palta','tipo_platos_id'=>$entrada,'categoria_platos_id'=>$menu]);
        Plato::create(['nombre'=>'tequeños','tipo_platos_id'=>$entrada,'categoria_platos_id'=>$menu]);
        Plato::create(['nombre'=>'arroz con pollo','tipo_platos_id'=>$fondo,'categoria_platos_id'=>$menu]);
        Plato::create(['nombre'=>'arroz chaufa','tipo_platos_id'=>$fondo,'categoria_platos_id'=>$menu]);
        Plato::create(['nombre'=>'sopa de moron','tipo_platos_id'=>$sopa,'categoria_platos_id'=>$menu]);
        Plato::create(['nombre'=>'sopa de choro','tipo_platos_id'=>$sopa,'categoria_platos_id'=>$menu]);
        Plato::create(['nombre'=>'arroz con leche','tipo_platos_id'=>$postre,'categoria_platos_id'=>$menu]);
        Plato::create(['nombre'=>'mazamorra morada','tipo_platos_id'=>$postre,'categoria_platos_id'=>$menu]);


        Plato::create(['nombre'=>'arroz con pollo especial','tipo_platos_id'=>$fondo,'categoria_platos_id'=>$carta]);
        Plato::create(['nombre'=>'chaufa especial','tipo_platos_id'=>$fondo,'categoria_platos_id'=>$carta]);
        Plato::create(['nombre'=>'arroz con leche','tipo_platos_id'=>$postre,'categoria_platos_id'=>$carta]);
        Plato::create(['nombre'=>'mazamorra morada','tipo_platos_id'=>$postre,'categoria_platos_id'=>$carta]);

    }
}