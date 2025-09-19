<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLoveGiftTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_bank' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'no_rek' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
            'type' => 'TIMESTAMP',
            'null' => true,
            'default' => null,
            ],
            'updated_at' => [
            'type' => 'TIMESTAMP',
            'null' => true,
            'default' => null,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('love_gift');
    }

    public function down()
    {
        $this->forge->dropTable('love_gift');
    }
}
