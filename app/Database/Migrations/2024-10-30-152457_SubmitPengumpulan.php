<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubmitPengumpulan extends Migration
{
    public function up()
    {
        // Nonaktifkan foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->addField([
            'id_submit_pengumpulan' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'tim' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'ketua' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'lomba' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'pembimbing' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'sekolah' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'link_tugas' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'created_at' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'updated_at' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
        ]);

        $this->forge->addKey('id_submit_pengumpulan', true);

        // // Tambahkan foreign keys
        // $this->forge->addForeignKey('id_tim_lomba', 'tim_lomba', 'id_tim_lomba', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('id_ketua', 'ketua', 'id_ketua', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('id_lomba', 'lomba', 'id_lomba', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('id_pembimbing', 'pembimbing', 'id_pembimbing', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('id_sekolah', 'sekolah', 'id_sekolah', 'CASCADE', 'CASCADE');

        $this->forge->createTable('submit_pengumpulan');

        // Aktifkan kembali foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down()
    {
        // Nonaktifkan foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        // Hapus table submit_pengumpulan dan foreign key
        $this->forge->dropTable('submit_pengumpulan', true);

        // Aktifkan kembali foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }
}
