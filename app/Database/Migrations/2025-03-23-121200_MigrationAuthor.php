<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationAuthor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'first_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'last_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'birth_date' => ['type' => 'DATE'],
            'nationality' => ['type' => 'VARCHAR', 'constraint' => 255],
            'biography' => ['type' => 'TEXT'],
            'portrait_image' => ['type' => 'VARCHAR', 'constraint' => 255],
            'fun_fact' => ['type' => 'TEXT']
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('author');
    }

    public function down()
    {
        
    }
}
