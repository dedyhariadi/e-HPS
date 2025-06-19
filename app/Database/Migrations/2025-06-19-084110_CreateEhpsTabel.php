<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEhpsTabel extends Migration
{
    public function up()
    {

        // Awal Pangkat Table

        $this->forge->addField([
            'idPangkat' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'pangkat' => ['type' => 'VARCHAR', 'constraint' => '100']
        ]);

        $this->forge->addKey('idPangkat', true);
        $this->forge->addUniqueKey('pangkat');

        $this->forge->createTable('pangkat', true);

        // Insert initial data into pangkat table
        $data = [
            ['pangkat' => 'Laksamana Pertama TNI'],
            ['pangkat' => 'Kolonel Laut (E)'],
            ['pangkat' => 'Letkol Laut (E)'],
            ['pangkat' => 'Mayor Laut (E)'],
        ];
        $this->db->table('pangkat')->insertBatch($data);
        //akhir pangkat table


        // awal Sumber Table
        $this->forge->addField([
            'idSumber' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'namaSumber' => ['type' => 'VARCHAR', 'constraint' => '100']
        ]);

        $this->forge->addKey('idSumber', true);

        $this->forge->createTable('sumber', true);
        // Insert initial data into sumber table
        $dataSumber = [
            ['namaSumber' => 'Shopee'],
            ['namaSumber' => 'Tokopedia'],
            ['namaSumber' => 'Lazada'],
            ['namaSumber' => 'Monotaro'],
            ['namaSumber' => 'Giat Sebelumnya']
        ];
        $this->db->table('sumber')->insertBatch($dataSumber);
        // akhir Sumber Table

        //
    }

    public function down()
    {
        //
        $this->forge->dropTable('pangkat', true);
        $this->forge->dropTable('sumber', true);
    }
}
