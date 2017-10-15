<?php

class Career extends Eloquent
{
    protected $fillable = ['name'];
    protected $table = 'ren_carrera';
    public $timestamps = false;
}