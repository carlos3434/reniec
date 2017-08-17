<?php

class Trabajador extends Eloquent
{
    use DataViewer;
    protected $dates = ['created_at','updated_at','deleted_at'];
    protected $table = 'trabajadores';
    protected $guarded =[];
}