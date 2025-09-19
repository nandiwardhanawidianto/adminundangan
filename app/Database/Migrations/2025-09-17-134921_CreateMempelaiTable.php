<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMempelaiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'foto_pengantin_1' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_pengantin_1' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_pengantin_1' => [
                'type' => 'TEXT',
            ],
            'foto_pengantin_2' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_pengantin_2' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_pengantin_2' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('mempelai');
    }

    public function down()
    {
        $this->forge->dropTable('mempelai');
    }
}
