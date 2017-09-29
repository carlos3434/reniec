<?php

class CareerSeeder extends Seeder {

    public function run() {

        Career::truncate();

        $careerNames = [
            'Ingeniería Informática',
            'Derecho',
            'Arquitectura',
            'Ingeniería Industrial',
            'Psicología'
        ];

        foreach ($careerNames as $careerName) {
          Career::create(
            array('name' => $careerName)
          );
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
        };

    }

}
