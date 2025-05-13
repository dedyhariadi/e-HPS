<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrxGiatBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idTrxGiatBarang' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kegiatanId' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'barangId' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'kebutuhan' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'jenis' => [
                'type'       => 'ENUM',
                'constraint' => ['utama', 'pendukung', 'jasa'],
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
        $this->forge->addKey('idTrxGiatBarang', true);
        $this->forge->addForeignKey('kegiatanId', 'kegiatan', 'idKegiatan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('barangId', 'barang', 'idBarang', 'CASCADE', 'CASCADE');
        $this->forge->createTable('trxGiatBarang');
    }

    public function down()
    {
        $this->forge->dropForeignKey('trxGiatBarang', 'trxGiatBarang_kegiatanId_foreign');
        $this->forge->dropForeignKey('trxGiatBarang', 'trxGiatBarang_barangId_foreign');
        $this->forge->dropTable('trxGiatBarang');
    }
}
