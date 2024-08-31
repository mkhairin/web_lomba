<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sponsor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sponsor' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_sponsor' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'logo' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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

        $this->forge->addKey('id_sponsor', true);
        $this->forge->createTable('sponsor');
    }

    public function down()
    {
        $this->forge->dropTable('sponsor');
    }
}
