<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idBarang' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'namaBarang' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'satuanId' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
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
        $this->forge->addKey('idBarang', true);
        $this->forge->addForeignKey('satuanId', 'satuan', 'idSatuan', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropForeignKey('satuanId', 'barang_satuanId_foreign');
        $this->forge->dropTable('barang');
    }
}
