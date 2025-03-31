<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationBookAuthor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'book_id' => ['type' => 'INT', 'unsigned' => true],
            'author_id' => ['type' => 'INT', 'unsigned' => true]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('book_id', 'book', 'id');
        $this->forge->addForeignKey('author_id', 'author', 'id');
        $this->forge->createTable('book_author');
    }
 
    public function down()
    {
        
    }
}
