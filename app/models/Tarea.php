<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Tarea extends Eloquent
{

    use DataViewer,SoftDeletingTrait;

    protected $dates = ['created_at','updated_at','deleted_at'];
    protected $table = 'tareas';
    protected $guarded =[];
    public function movimientos()
    {
        return $this->hasMany('Movimiento');
    }
    public function scopeTipoEstado($query){
        return $query->join('tipo_tareas as tt', 'tareas.tipo_tarea_id', '=', 'tt.id');

    }
    public function scopeEstadoTarea($query){
        return $query->join('estado_tareas as et', 'tareas.estado_tarea_id', '=', 'et.id');
    }
    public function scopeTrabajador($query){
        return $query->leftjoin('trabajadores as t', 'tareas.EmployeeNumber', '=', 't.EmployeeNumber');
    }
    public function getCreatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }
}