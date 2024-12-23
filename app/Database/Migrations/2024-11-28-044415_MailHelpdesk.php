<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MailHelpdesk extends Migration
{
    public function up()
    {
        // Membuat tabel sent_emails
        $this->forge->addField([
            'id_emails' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'subject' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'message' => [
                'type' => 'TEXT',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['sent', 'failed'],
                'default' => 'sent',
            ],
            'tgl' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'jam' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'read' => [
                'type' => 'ENUM',
                'constraint' => ['unread', 'read'],
                'default' => 'unread',
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
        $this->forge->addPrimaryKey('id_emails');
        $this->forge->createTable('sent_emails');
    }

    public function down()
    {
        // Menghapus tabel sent_emails jika migrasi dibatalkan
        $this->forge->dropTable('sent_emails');
    }
}
