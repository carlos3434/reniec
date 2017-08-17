<?php
 
class TareaSeeder extends DatabaseSeeder
{
    public function run()
    {
        EstadoTarea::create(['nombre'=>'Pendiente']);
        EstadoTarea::create(['nombre'=>'Asignado']);
        EstadoTarea::create(['nombre'=>'Iniciado']);
        EstadoTarea::create(['nombre'=>'No Realizado']);
        EstadoTarea::create(['nombre'=>'Completado']);
        EstadoTarea::create(['nombre'=>'Cancelado']);
        EstadoTarea::create(['nombre'=>'Suspendido']);
        EstadoTarea::create(['nombre'=>'Eliminado']);


        TipoTarea::create(['nombre'=>'Serenazgo']);
        TipoTarea::create(['nombre'=>'Rentas']);
        TipoTarea::create(['nombre'=>'Fiscalizacion']);



        TipoPersona::create(['nombre'=>'Sereno']);
        TipoPersona::create(['nombre'=>'Rentas']);
        TipoPersona::create(['nombre'=>'Fiscalizador']);


        Persona::create(['nombre'=>'Sereno jose','tipo_persona_id'=>1]);
        Persona::create(['nombre'=>'Rentas marcos','tipo_persona_id'=>2]);
        Persona::create(['nombre'=>'Fiscalizador Antonio','tipo_persona_id'=>3]);

      $tarea = [
          'TaskNumber'      => '123456',
          'EmployeeNumber'  => '667',
          'DueDate'         => '20170810235959',
          'Duration'        => '0.75',
          'Notes'           => '',
          'Description'     => 'trabajo de campo',
          'CustomerName'    => 'DELGADO DE LA FLOR DE PIEROLA',
          'Address'         => 'AV LA MERCED 625 UR UR MONTAGNE',
          'coordx'          => '-76.9815876',
          'coordy'          => '-12.0775882',
          "estado_tarea_id"    => 1
      ];

      for ($i=0; $i <30 ; $i++) {
        $tarea['tipo_tarea_id'] = 1;
        $mov = new Movimiento($tarea);
        $tareaObj = new Tarea($tarea);
        $tareaObj->save();
        $tareaObj->movimientos()->save($mov);
      }
      for ($i=30; $i <60 ; $i++) {
        $tarea['tipo_tarea_id'] = 2;
        $mov = new Movimiento($tarea);
        $tareaObj = new Tarea($tarea);
        $tareaObj->save();
        $tareaObj->movimientos()->save($mov);
      }
      for ($i=60; $i <90 ; $i++) {
        $tarea['tipo_tarea_id'] = 3;
        $mov = new Movimiento($tarea);
        $tareaObj = new Tarea($tarea);
        $tareaObj->save();
        $tareaObj->movimientos()->save($mov);
      }
    }
}