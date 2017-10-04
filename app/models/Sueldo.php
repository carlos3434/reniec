<?php

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
