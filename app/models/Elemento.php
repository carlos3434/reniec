<?php

class Elemento extends Eloquent
{
    use DataViewer;

    protected $fillable = [
        'nombre',
    ];
    public function inventario(){
        return $this->belongsTo('Inventario');
    
    }
}