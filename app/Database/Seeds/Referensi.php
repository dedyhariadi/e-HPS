<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Referensi extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $data = [
                [
                    'sumber' => 'Tokopedia',
                    'link' => 'www.tokopedia.com',
                    'harga' => rand(2000, 100000),
                    'barangId' => rand(1, 20),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'sumber' => 'Shopee',
                    'link' => 'www.shopee.com',
                    'harga' => rand(2000, 100000),
                    'barangId' => rand(1, 20),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'sumber' => 'Lazada',
                    'link' => 'www.lazada.com',
                    'harga' => rand(2000, 100000),
                    'barangId' => rand(1, 20),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'sumber' => 'Giat sebelumnya',
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
