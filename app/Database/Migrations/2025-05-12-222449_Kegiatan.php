<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kegiatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idKegiatan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'namaKegiatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],

            'noSurat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tglSurat' => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'pejabatId' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'dasarId' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
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
        $this->forge->addKey('idKegiatan', true);
        $this->forge->addForeignKey('pejabatId', 'pejabat', 'idPejabat', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('dasarId', 'dasarsurat', 'idSurat', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kegiatan');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('pejabatId', 'kegiatan_pejabatId_foreign');
        // $this->forge->dropForeignKey('dasarId', 'kegiatan_dasarId_foreign');
        $this->forge->dropTable('kegiatan');
    }
}
