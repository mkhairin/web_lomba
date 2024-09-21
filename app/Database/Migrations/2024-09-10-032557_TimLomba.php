<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TimLomba extends Migration
{
    public function up()
    {
        // Nonaktifkan foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->addField([
            'id_tim_lomba' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_sekolah' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
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
            'nama_tim' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'ketua_tim' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'anggota' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'no_ketua' => [
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

        $this->forge->addKey('id_tim_lomba', true);
        $this->forge->addForeignKey('id_sekolah', 'sekolah', 'id_sekolah', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_lomba', 'lomba', 'id_lomba', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pembimbing', 'pembimbing', 'id_pembimbing', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tim_lomba');

        // Aktifkan kembali foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down()
    {
        // Nonaktifkan foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->dropTable('tim_lomba');

        // Aktifkan kembali foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }
}
