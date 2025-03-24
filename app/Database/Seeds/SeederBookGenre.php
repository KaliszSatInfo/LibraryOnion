<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederBookGenre extends Seeder
{
    public function run()
    {
        $bookId = $this->db->table('book')->select('id')->get()->getResultArray();
        $genreId = $this->db->table('genre')->select('id')->get()->getResultArray();

        $bookId = array_column($bookId, 'id');
        $genreId = array_column($genreId, 'id');

        foreach ($bookId as $singleBookId) {
            $selectedGenres = (array) array_rand(array_flip($genreId), rand(1, 3));

            foreach ($selectedGenres as $singleGenreId) {
                $this->db->table('book_genre')->insert([
                    'book_id'  => $singleBookId,
                    'genre_id' => $singleGenreId,
                ]);
            }
        }
    }
}