<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederDatabase extends Seeder
{
    public function run()
    {
        $this->call('SeederAuthor');
        $this->call('SeederBook');
        $this->call('SeederGenre');
        $this->call('SeederBookAuthor');
        $this->call('SeederBookGenre');
    }
}
