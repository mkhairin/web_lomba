<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          =>  true,
                'auto_increment'    => true
            ],
            'username' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'password' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'tim_lomba' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'jenis_lomba' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ]
        ]);

        $this->forge->addKey('id_user', true);
        $this->forge->createTable('User');
    }

    public function down()
    {
        $this->forge->dropTable('User');
    }
}
