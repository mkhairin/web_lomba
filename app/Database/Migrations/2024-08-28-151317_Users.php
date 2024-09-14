<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_sekolah' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
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
            'roles' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
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

        $this->forge->addKey('id_user', true);
        $this->forge->addForeignKey('id_sekolah', 'sekolah', 'id_sekolah', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_tim_lomba', 'tim_lomba', 'id_tim_lomba', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_lomba', 'lomba', 'id_lomba', 'CASCADE', 'CASCADE');
        $this->forge->createTable('users');

        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function down()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');
        $this->forge->dropTable('users');
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }
}
