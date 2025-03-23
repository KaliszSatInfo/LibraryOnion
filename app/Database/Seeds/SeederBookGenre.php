<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederBookGenre extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        $bookIds  = array_column($db->table('book')->select('id')->get()->getResultArray(), 'id');
        $genreIds = array_column($db->table('genre')->select('id')->get()->getResultArray(), 'id');

        if (empty($bookIds) || empty($genreIds)) {
            return;
        }

        for ($i = 0; $i < 5000; $i++) {
            $db->table('book_genre')->insert([
                'book_id'  => $bookIds[array_rand($bookIds)],
                'genre_id' => $genreIds[array_rand($genreIds)],
            ]);
        }
    }

}