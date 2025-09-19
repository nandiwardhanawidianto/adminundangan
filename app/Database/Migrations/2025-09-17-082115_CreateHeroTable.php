<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHeroTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_mempelai' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'foto_background' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tanggal_acara' => [
                'type' => 'DATE',
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
        $this->forge->createTable('hero');
    }

    public function down()
    {
        $this->forge->dropTable('hero');
    }
}
