<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class SeederAuthor extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for($i = 0; $i < 500; $i++){
            $data = [
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'birth_date' => $faker->dateTimeBetween('-300 years', '-15 years')->format('Y-m-d'),
                'nationality' => $faker->country(),
                'biography' => $faker->paragraph(6),
                'portrait_image' => 'https://i.pravatar.cc/300?img=' . rand(1, 70),
                'fun_fact' => $faker->sentence(),
            ];
            $this->db->table('author')->insert($data);
        }
    }
}
