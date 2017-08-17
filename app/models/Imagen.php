<?php

class Imagen extends \Eloquent
{

    protected $table = 'imagenes';
    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $guarded =[];
}
