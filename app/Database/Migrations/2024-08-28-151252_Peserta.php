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
            'nama_peserta' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'pembimbing' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'sekolah' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'lomba' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
        ]);

        $this->forge->addKey('id_peserta', true);
        $this->forge->createTable('Peserta');
    }

    public function down()
    {
        $this->forge->dropTable('Peserta');
    }
}
