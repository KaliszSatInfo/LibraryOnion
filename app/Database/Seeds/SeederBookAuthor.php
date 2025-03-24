<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederBookAuthor extends Seeder
{
    public function run()
    {
        $bookId = $this->db->table('book')->select('id')->get()->getResultArray();
        $authorId = $this->db->table('author')->select('id')->get()->getResultArray();

        $bookId = array_column($bookId, 'id');
        $authorId = array_column($authorId, 'id');

        foreach ($bookId as $singleBookId) {
            $chance = rand(1, 100);

            if ($chance <= 5) {
                $selectedAuthors = (array) array_rand(array_flip($authorId), 2);
            } else {
                $selectedAuthors = [array_rand($authorId)];
            }

            foreach ($selectedAuthors as $singleAuthorId) {
                $this->db->table('book_author')->insert([
                    'book_id'   => $singleBookId,
                    'author_id' => $singleAuthorId
                ]);
            }
        }
    }
}
