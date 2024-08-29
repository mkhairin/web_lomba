<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sekolah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sekolah' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'nama_sekolah' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'alamat' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
        ]);
        $this->forge->addKey('id_sekolah', true);
        $this->forge->createTable('Sekolah');
    }

    public function down()
    {
        $this->forge->dropTable('Sekolah');
    }
}
