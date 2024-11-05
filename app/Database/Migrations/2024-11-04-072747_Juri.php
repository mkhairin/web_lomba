<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Juri extends Migration
{
    public function up()
    {
        // Nonaktifkan foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->addField([
            'id_juri' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
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

        $this->forge->addKey('id_juri', true);
        $this->forge->createTable('juri');

        // Aktifkan kembali foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down()
    {
        // Nonaktifkan foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->dropTable('juri');

        // Aktifkan kembali foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }
}
