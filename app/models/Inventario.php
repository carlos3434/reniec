<?php

class Inventario extends Eloquent
{
    use DataViewer;
    
    protected $fillable = [
        'codigo',
        'nombre',
        'observacion',
        'proveedor',
        'cantidad',
        'categoria_id',
    ];

    public function elementos(){
        return $this->hasMany('Elemento');
    }
    public function scopeCategoria($query){
        return $query->join(
            'categorias as c',
            'inventarios.categoria_id',
            '=',
            'c.id'
        )->select('inventarios.*','c.nombre as categoria');
    }
}