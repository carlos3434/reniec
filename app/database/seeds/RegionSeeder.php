<?php

class RegionSeeder extends Seeder {

    public function run() {

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
