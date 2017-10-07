<?php

class Sueldo extends Eloquent
{
  
    protected $fillable = [
      'careerId',
      'referenceYear',
      'experienceYears',
      'gender',
      'salary',
      'quantity'
    ];

    public $timestamps = false;

}
