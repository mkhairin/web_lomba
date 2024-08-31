<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembimbing extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembimbing' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_sekolah' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'nama_pembimbing' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'lomba' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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

        $this->forge->addKey('id_pembimbing', true);
        $this->forge->addForeignKey('id_sekolah', 'sekolah', 'id_sekolah', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembimbing');
    }

    public function down()
    {
        $this->forge->dropTable('pembimbing');
    }
}
