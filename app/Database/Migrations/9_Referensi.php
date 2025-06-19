<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Referensi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idReferensi' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'sumberId' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'link' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'harga' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'barangId' => [
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
        $this->forge->addKey('idReferensi', true);
        $this->forge->addForeignKey('sumberId', 'sumber', 'idSumber', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('barangId', 'barang', 'idBarang', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('referensi');
    }

    public function down()
    {
        $this->forge->dropForeignKey('referensi', 'referensi_barangId_foreign');
        $this->forge->dropTable('referensi');
    }
}
