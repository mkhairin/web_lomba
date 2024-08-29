<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lomba extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_lomba' => [
                'type'              =>  'INT',
                'constraint'        =>  5,
                'unsigned'          =>  true,
                'auto_increment'    => true
            ],
            'nama' => [
                'type'              => 'VARCHAR',
                'constraint'        =>  '255'
            ],
            'deskripsi' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ],
            'peraturan' => [
                'type'              =>  'VARCHAR',
                'constraint'        =>  '255'
            ],
            'tgl_dibuka' => [
                'type'              => 'DATE'
            ],
            'tgl_ditutup' => [
                'type'              => 'DATE'
            ],
            'status' => [
                'type'              =>  'VARCHAR',
                'constraint'        =>  '255'
            ]
            ]);

            $this->forge->addKey('id_lomba', true);
            $this->forge->createTable('Lomba');

    }

    public function down()
    {
        $this->forge->dropTable('Lomba');
    }
}
