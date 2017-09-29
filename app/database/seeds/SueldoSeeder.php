<?php

class SueldoSeeder extends Seeder {

    public function run() {

        Sueldo::truncate();

        $careerIds = [1,2,3,4,5];
        $referenceYears = [2017,2016];
        $experienceYearsSample = [1,5];

        foreach ($careerIds as $careerId) {

            foreach ($referenceYears as $referenceYear) {

                foreach ($experienceYearsSample as $experienceYears) {

                    Sueldo::create(
                        array(
                            'careerId' => $careerId,
                            'referenceYear' => $referenceYear,
                            'experienceYears' => $experienceYears,
                            'salary' => ,
                            'quantity' => 
                        )
                    );

                }

            }

        }

    }

}
