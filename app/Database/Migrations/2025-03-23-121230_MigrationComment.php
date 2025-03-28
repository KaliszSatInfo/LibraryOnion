<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationComment extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'book_id' => ['type' => 'INT', 'unsigned' => true],
            'user_id' => ['type' => 'INT', 'unsigned' => true],
            'text' => ['type' => 'TEXT']
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('book_id', 'book', 'id');
        $this->forge->addForeignKey('user_id', 'user', 'id');
        $this->forge->createTable('comment');
    }

    public function down()
    {
        
    }
}
