<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sponsor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sponsor' => [
                'type'              =>  'INT',
                'constraint'        =>  5,
                'unsigned'          =>  true,
                'auto_increment'    => true
            ],
            'nama_sponsor' => [
                'type'              => 'VARCHAR',
                'constraint'        =>  '255'
            ],
            'logo' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255'
            ]
            ]);

            $this->forge->addKey('id_sponsor', true);
            $this->forge->createTable('Sponsor');
    }

    public function down()
    {
        $this->forge->dropTable('Sponsor');
    }
}
