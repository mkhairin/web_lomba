<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TimSoalSelesai extends Migration
{
    public function up()
    {
        // Nonaktifkan foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->addField([
            'id_selesao' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_tim' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'lomba' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'sekolah' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'ketua' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'pembimbing' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
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

        $this->forge->addKey('id_soal', true);
        $this->forge->createTable('soal');

        // Aktifkan kembali foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down()
    {
        // Nonaktifkan foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->dropTable('soal');

        // Aktifkan kembali foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }
}
