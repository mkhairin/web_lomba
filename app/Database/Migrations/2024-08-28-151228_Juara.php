<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Juara extends Migration
{
    public function up()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->addField([
            'id_juara' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'juara' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'total_hadiah' => [
                'type'       => 'INT',
                'constraint' => 20,
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

        $this->forge->addKey('id_juara', true);
        $this->forge->createTable('juara');

        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->dropTable('juara');

        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }
}
