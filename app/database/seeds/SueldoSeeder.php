<?php

class SueldoSeeder extends Seeder {

    public function run() {

        Sueldo::truncate();

        $careerIds = [1,2,3,4,5];
        $referenceYears = [2017,2016];
        $experienceYearsSample = [1,5];
        $genders = ['F', 'M'];

        $samples = [1,2,3,4,5];

        function random_float ($min,$max) {
            return ($min + lcg_value()*(abs($max - $min)));
        };

        foreach ($careerIds as $careerId) {

            foreach ($referenceYears as $referenceYear) {

                foreach ($experienceYearsSample as $experienceYears) {

                    foreach ($genders as $gender) {

                        foreach ($samples as $sample) {

                            $randomFactor1 = random_float(0,1);
                            $randomFactor2 = random_float(0,1);

                            Sueldo::create(
                                array(
                                    'careerId' => $careerId,
                                    'referenceYear' => $referenceYear,
                                    'experienceYears' => $experienceYears,
                                    'gender' => $gender,
                                    'salary' => $sample * 1000 + intval ( $randomFactor1 * 1000 * 5 ),
                                    'quantity' => 2000 + intval ( $randomFactor2 * 1000 )
                                )
                            );

                        }

                    }

                }

            }

        }

    }

}
