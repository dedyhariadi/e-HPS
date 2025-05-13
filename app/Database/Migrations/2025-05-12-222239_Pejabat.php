<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pejabat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idPejabat' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'namaPejabat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pangkat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'NRP' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'jabatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'    => true,
            ],

        ]);
        $this->forge->addKey('idPejabat', true);
        $this->forge->createTable('pejabat');
    }

    public function down()
    {
        $this->forge->dropTable('pejabat');
    }
}
