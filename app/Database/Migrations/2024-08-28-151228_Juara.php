<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Juara extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_juara' => [
                'type'              => 'INT',
                'constraint'        =>  5,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'juara' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255'
            ],
            'total_hadiah' => [
                'type'          => 'INT',
                'constraint'    => 20
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
