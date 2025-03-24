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

        foreach ($authorId as $singleAuthorId) {
            $randomBookId = $bookId[array_rand($bookId)];

            $this->db->table('book_author')->insert([
                'book_id'   => $randomBookId,
                'author_id' => $singleAuthorId
            ]);
        }

        foreach ($bookId as $singleBookId) {
            $existing = $this->db->table('book_author')
                ->where('book_id', $singleBookId)
                ->countAllResults();

            if ($existing === 0) {
                $author = $authorId[array_rand($authorId)];

                $this->db->table('book_author')->insert([
                    'book_id'   => $singleBookId,
                    'author_id' => $author
                ]);
            }

            if (rand(1, 100) <= 5) {
                $author = $authorId[array_rand($authorId)];

                $exists = $this->db->table('book_author')
                    ->where(['book_id' => $singleBookId, 'author_id' => $author])
                    ->countAllResults();

                if (!$exists) {
                    $this->db->table('book_author')->insert([
                        'book_id'   => $singleBookId,
                        'author_id' => $author
                    ]);
                }
            }
        }
    }
}
