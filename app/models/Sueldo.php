<?php

class Region extends Eloquent
{
    public $timestamps = false;
    protected $guarded = ['deleted_at'];
}

class Sueldo extends Eloquent
{
  
    protected $fillable = [
      'careerId',
      'referenceYear',
      'experienceYears',
      'salary',
      'quantity'
    ];

    public $timestamps = false;

}
