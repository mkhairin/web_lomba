<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ForAnyQuestion extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_faq' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'questions' => [
                'type'          => 'TEXT',
                'null'          => true
            ],
            'answers' => [
                'type'          => 'TEXT',
                'null'          => true
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

        $this->forge->addKey('id_faq', true);
        $this->forge->createTable('faquestions');
    }

    public function down()
    {
        $this->forge->dropTable('faquestions');
    }
}
