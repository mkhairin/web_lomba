<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peserta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peserta' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_lomba' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'id_pembimbing' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'id_sekolah' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'nama_peserta' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
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

        $this->forge->addKey('id_peserta', true);
        $this->forge->addForeignKey('id_lomba', 'lomba', 'id_lomba', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pembimbing', 'sekolah', 'id_sekolah', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_sekolah', 'pembimbing', 'id_pembimbing', 'CASCADE', 'CASCADE');
        $this->forge->createTable('peserta');
    }

    public function down()
    {
        $this->forge->dropTable('peserta');
    }
}
