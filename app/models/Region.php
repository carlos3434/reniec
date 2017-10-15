<?php

class Region extends Eloquent
{
    public $timestamps = false;
    protected $table = 'ren_ciudad';
    protected $guarded = ['deleted_at'];
}