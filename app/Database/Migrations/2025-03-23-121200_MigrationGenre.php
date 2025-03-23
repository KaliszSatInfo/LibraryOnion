<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationGenre extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 255]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('genre');
    }
 
    public function down()
    {
        
    }
}
