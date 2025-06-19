<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DasarSurat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idSurat' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'noSurat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tglSurat' => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'tentang' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pejabat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'filePdf' => [
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
        $this->forge->addKey('idSurat', true);
        $this->forge->createTable('dasarSurat');
    }

    public function down()
    {
        $this->forge->dropTable('dasarSurat');
    }
}
