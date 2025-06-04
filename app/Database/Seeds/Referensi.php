<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Referensi extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 30; $i++) {
            $data = [
                [
                    'sumberId' => rand(1, 4),
                    'link' => 'www.tokopedia.com',
                    'harga' => rand(2000, 100000),
                    'barangId' => rand(1, 20),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'sumberId' => 5,
                    'link' => 'https://www.monotaro.id/p106035324.html',
                    'harga' => 89000,
                    'barangId' => rand(1, 20),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'sumberId' => rand(1, 4),
                    'link' => 'www.lazada.com',
                    'harga' => rand(2000, 100000),
                    'barangId' => rand(1, 20),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'sumberId' => rand(1, 4),
                    'link' => 'R/10/IV/2005',
                    'harga' => rand(2000, 100000),
                    'barangId' => rand(1, 20),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ];

            // Using Query Builder
            $this->db->table('referensi')->insertBatch($data);
        }
    }
}
