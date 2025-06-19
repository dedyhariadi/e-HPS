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
            'pangkatId' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
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
        $this->forge->addForeignKey('pangkatId', 'pangkat', 'idPangkat', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('dasarId', 'dasarsurat', 'idSurat', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('pejabat');
    }

    public function down()
    {
        $this->forge->dropTable('pejabat');
    }
}
