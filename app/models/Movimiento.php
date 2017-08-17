<?php

class Movimiento extends Eloquent
{
    use DataViewer;
    protected $dates = ['created_at','updated_at','deleted_at'];
    protected $table = 'movimientos';
    protected $guarded =[];
}