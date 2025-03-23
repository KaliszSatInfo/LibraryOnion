<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederBookAuthor extends Seeder
{
    public function run()
    {
        $authorIds = $this->db->table('author')->select('id')->get()->getResultArray();
        $bookIds   = $this->db->table('book')->select('id')->get()->getResultArray();

        $authorIds = array_column($authorIds, 'id');
        $bookIds   = array_column($bookIds, 'id');

        if (empty($authorIds) || empty($bookIds)) {
            return;
        }

        for ($i = 0; $i < 5000; $i++) {
            $data = [
                'book_id'   => $bookIds[array_rand($bookIds)],
                'author_id' => $authorIds[array_rand($authorIds)],
            ];

            $this->db->table('book_author')->insert($data);
        }
    }

}
