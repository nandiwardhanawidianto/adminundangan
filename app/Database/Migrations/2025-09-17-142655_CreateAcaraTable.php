<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAcaraTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'nama_acara' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_waktu' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'deskripsi_alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'link_maps' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
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
        $this->forge->createTable('acara');
    }

    public function down()
    {
        $this->forge->dropTable('acara');
    }
}
