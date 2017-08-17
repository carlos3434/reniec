<?php

class Formulario extends \Eloquent
{

    protected $table = 'formularios';
    protected $dates = ['created_at','updated_at','deleted_at'];
    protected $guarded =[];
    public function imagenes()
    {
        return $this->hasMany('Imagen');
    }
}
