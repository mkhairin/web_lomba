<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peserta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_peserta' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          =>  true,
                'auto_increment'    => true
            ],
            'id_lomba' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          =>  true,
            ],
            'id_pembimbing' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          =>  true,
            ],
            'id_sekolah' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          =>  true,
            ],
            'nama_peserta' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'pembimbing' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'lomba' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
        ]);

        $this->forge->addKey('id_peserta', true);
        $this->forge->addForeignKey('id_lomba', 'Lomba', 'id_lomba', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_sekolah', 'Sekolah', 'id_sekolah', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pembimbing', 'Pembimbing', 'id_pembimbing', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Peserta');
    }

    public function down()
    {
        $this->forge->dropTable('Peserta');
    }
}
