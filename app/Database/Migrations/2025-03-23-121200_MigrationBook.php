<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationBook extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'description' => ['type' => 'TEXT'],
            'published_date' => ['type' => 'DATE'],
            'cover_image' => ['type' => 'VARCHAR', 'constraint' => 255],
            'isbn' => ['type' => 'VARCHAR', 'constraint' => 255]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('book');
    }

    public function down()
    {
        
    }
}
