<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederBookAuthor extends Seeder
{
    public function run()
    {
        $bookIds = $this->db->table('book')->select('id')->get()->getResultArray();
        $authorIds = $this->db->table('author')->select('id')->get()->getResultArray();

        $bookIds = array_column($bookIds, 'id');
        $authorIds = array_column($authorIds, 'id');

        foreach ($authorIds as $authorId) {
            $randomBookId = $bookIds[array_rand($bookIds)];

            $this->db->table('book_author')->insert([
                'book_id'   => $randomBookId,
                'author_id' => $authorId
            ]);
        }

        foreach ($bookIds as $bookId) {
            $existing = $this->db->table('book_author')
                ->where('book_id', $bookId)
                ->countAllResults();

            if ($existing === 0) {
                $author = $authorIds[array_rand($authorIds)];

                $this->db->table('book_author')->insert([
                    'book_id'   => $bookId,
                    'author_id' => $author
                ]);
            }

            if (rand(1, 100) <= 5) {
                $author = $authorIds[array_rand($authorIds)];

                $exists = $this->db->table('book_author')
                    ->where(['book_id' => $bookId, 'author_id' => $author])
                    ->countAllResults();

                if (!$exists) {
                    $this->db->table('book_author')->insert([
                        'book_id'   => $bookId,
                        'author_id' => $author
                    ]);
                }
            }
        }
    }
}