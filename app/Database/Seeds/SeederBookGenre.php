<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederBookGenre extends Seeder
{
    public function run()
    {
        $bookIds = $this->db->table('book')->select('id')->get()->getResultArray();
        $genreIds = $this->db->table('genre')->select('id')->get()->getResultArray();

        $bookIds = array_column($bookIds, 'id');
        $genreIds = array_column($genreIds, 'id');

        foreach ($bookIds as $bookId) {
            $selectedGenres = (array) array_rand(array_flip($genreIds), rand(1, 3));

            foreach ($selectedGenres as $genreId) {
                $this->db->table('book_genre')->insert([
                    'book_id'  => $bookId,
                    'genre_id' => $genreId,
                ]);
            }
        }
    }
}