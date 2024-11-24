<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DeadlineTugas extends Migration
{

    public function up()
    {
        // Nonaktifkan foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->addField([
            'id_deadline' => [
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
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'deadline' => [
                'type' => 'DATETIME',
                'null' => false,
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

        $this->forge->addKey('id_deadline', true); // Primary key
        $this->forge->addForeignKey('id_lomba', 'lomba', 'id_lomba', 'CASCADE', 'CASCADE');
        $this->forge->createTable('deadline');

        // Aktifkan kembali foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down()
    {
        // Nonaktifkan foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->dropTable('deadline');

        // Aktifkan kembali foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }
}
