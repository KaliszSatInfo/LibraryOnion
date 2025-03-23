<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class SeederBook extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for($i = 0; $i < 5000; $i++){
            $data = [
                'title' => $faker->sentence(4),
                'description' => $faker->paragraph(8),
                'published_date' => $faker->date(),
                'cover_image' => 'https://picsum.photos/seed/' . uniqid() . '/400/600',
                'isbn' => $faker->isbn13()
            ];
            $this->db->table('book')->insert($data);
        }
    }
}
