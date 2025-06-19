<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sumber extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idSumber' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'namaSumber' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ]
        ]);
        $this->forge->addKey('idSumber', true);
        $this->forge->createTable('sumber');
    }

    public function down()
    {
        $this->forge->dropTable('sumber');
    }
}
