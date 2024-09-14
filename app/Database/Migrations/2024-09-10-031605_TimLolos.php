<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TimLolos extends Migration
{
    public function up()
    {
        // Nonaktifkan foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->addField([
            'id_tim_lolos' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_tim_lomba' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'id_lomba' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'id_sekolah' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'id_pembimbing' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'nilai' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id_tim_lolos', true);
        $this->forge->addForeignKey('id_tim_lomba', 'tim_lomba', 'id_tim_lomba', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_lomba', 'lomba', 'id_lomba', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_sekolah', 'sekolah', 'id_sekolah', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pembimbing', 'pembimbing', 'id_pembimbing', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tim_lolos');

        // Aktifkan kembali foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down()
    {
        // Nonaktifkan foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->dropTable('tim_lolos');

        // Aktifkan kembali foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }
}
