<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Sumber extends Seeder
{
    public function run()
    {
        $data = [
            [
                'namaSumber' => 'Shopee',
            ],
            [
                'namaSumber' => 'Tokopedia',
            ],
            [
                'namaSumber' => 'Lazada',
            ],
            [
                'namaSumber' => 'Giat Sebelumnya',
            ],
            [
                'namaSumber' => 'Monotaro'
            ]
        ];

        $this->db->table('sumber')->insertBatch($data);
    }
}
