<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subkegiatan extends Migration
{
    public function up()
    {

        //buat tabel subkegiatan
        $this->forge->addField([
            'idSubKegiatan' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama' => ['type' => 'VARCHAR', 'constraint' => 255],
            'kegiatanId' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],

        ]);

        $this->forge->addKey('idSubKegiatan', true);
        $this->forge->addForeignKey('kegiatanId', 'kegiatan', 'idKegiatan', 'CASCADE', 'RESTRICT');
        // $this->forge->addForeignKey('barangId', 'barang', 'idBarang', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('subKegiatan', true);


        // buat tabel trxSubKegiatan
        $this->forge->addField([
            'idTrxSubKegiatan' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'subKegiatanId' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'trxGiatBarangId' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],

        ]);

        $this->forge->addKey('idTrxSubKegiatan', true);
        $this->forge->addForeignKey('subKegiatanId', 'subkegiatan', 'idSubKegiatan', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('trxGiatBarangId', 'trxgiatbarang', 'idTrxGiatBarang', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('trxSubKegiatan', true);
    }

    public function down()
    {
        //hapus tabel 
        $this->forge->dropTable('subKegiatan', true);
        $this->forge->dropTable('trxSubKegiatan', true);
    }
}
