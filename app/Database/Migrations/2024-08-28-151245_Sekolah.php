<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sekolah extends Migration
{
    public function up()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->addField([
            'id_sekolah' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_sekolah' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
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
        $this->forge->addKey('id_sekolah', true);
        $this->forge->createTable('sekolah');

        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');
        $this->forge->dropTable('sekolah');
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }
}
