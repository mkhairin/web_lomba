<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Soal extends Migration
{
    public function up()
    {
        // Nonaktifkan foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->addField([
            'id_soal' => [
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
            'link_soal' => [
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
        $this->forge->addForeignKey('id_lomba', 'lomba', 'id_lomba', 'CASCADE', 'CASCADE');
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
