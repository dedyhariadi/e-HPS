<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pangkat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idPangkat' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'pangkat' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ]
        ]);
        $this->forge->addKey('idPangkat', true);
        $this->forge->createTable('pangkat');
    }

    public function down()
    {
        $this->forge->dropTable('pangkat');
    }
}
