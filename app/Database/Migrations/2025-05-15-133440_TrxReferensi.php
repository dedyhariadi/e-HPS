<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TrxReferensi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idTrxReferensi' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'trxGiatBarangId' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true
            ],
            'referensiId' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ]
        ]);
        $this->forge->addKey('idTrxReferensi', true);
        $this->forge->addForeignKey('trxGiatBarangId', 'trxGiatBarang', 'idTrxGiatBarang', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('referensiId', 'referensi', 'idReferensi', 'CASCADE', 'CASCADE');
        $this->forge->createTable('trxReferensi');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('trxGiatBarangId', 'trxReferensi_trxGiatBarangId_foreign');
        // $this->forge->dropForeignKey('referensiId', 'trxReferensi_referensiId_foreign');
        $this->forge->dropTable('trxReferensi');
    }
}
