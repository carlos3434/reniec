<?php
 
class CareerSeeder extends DatabaseSeeder
{
  public function run()
  {
    $careers = [
      [
        "name" => "Ingeniería Informática",
        "description" => "Ingeniería Informática"
      ],
      [
        "name" => "Derecho",
        "description" => "Derecho"
      ],
      [
        "name" => "Arquitectura",
        "description" => "Arquitectura"
      ],
      [
        "name" => "Ingeniería Industrial",
        "description" => "Ingeniería Industrial"
      ],
      [
        "name" => "Psicología",
        "description" => "Psicología"
      ]
    ];
  
    foreach ($careers as $career) {
      Career::create($career);
    }
    $regions =[
      [
        "name" => "Lima",
        "description" => "Lima"
      ],
      [
        "name" => "Huancayo",
        "description" => "Huancayo"
      ],
      [
        "name" => "Arequipa",
        "description" => "Arequipa"
      ],
      [
        "name" => "Piura",
        "description" => "Piura"
      ],
      [
        "name" => "Trujillo",
        "description" => "Trujillo"
      ],
    ];

    foreach ($regions as $region) {
      Region::create($region);
    }
  }
}