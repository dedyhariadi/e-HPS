<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pangkat extends Seeder
{
    public function run()
    {
        $data = [
            [
                'pangkat' => 'Laksamana Pertama TNI',
            ],
            [
                'pangkat' => 'Kolonel Laut (E)',
            ],
            [
                'pangkat' => 'Letkol Laut (E)',
            ],
            [
                'pangkat' => 'Mayor Laut (E)',
            ],

        ];
        $this->db->table('pangkat')->insertBatch($data);
    }
}
