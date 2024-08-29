<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembimbing extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembimbing' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          =>  true,
                'auto_increment'    => true
            ],
            'nama_pembimbing' => [
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

        $this->forge->addKey('id_pembimbing', true);
        $this->forge->createTable('Pembimbing');
    }

    public function down()
    {
        $this->forge->dropTable('Pembimbing');
    }
}
