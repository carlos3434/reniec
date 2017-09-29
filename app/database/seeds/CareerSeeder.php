<?php

class CareerSeeder extends Seeder {

    public function run()
    {
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
    }

}
