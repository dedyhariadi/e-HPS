<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Barang extends Seeder
{
    public function run()
    {
        $data = [
            [
                'namaBarang' => 'Cangkul',
                'satuanId' => rand(1, 10),
                'gambar' => 'pupuk_npk.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Semen',
                'satuanId' => rand(1, 10),
                'gambar' => 'cangkul.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Pasir',
                'satuanId' => rand(1, 10),
                'gambar' => 'cangkul.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Batu Bata',
                'satuanId' => rand(1, 10),
                'gambar' => 'cangkul.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Pupuk NPK',
                'satuanId' => rand(1, 10),
                'gambar' => 'cangkul.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Pupuk Organik',
                'satuanId' => rand(1, 10),
                'gambar' => 'cangkul.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Pupuk Hayati',
                'satuanId' => rand(1, 10),
                'gambar' => 'cangkul.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Pupuk Kandang',
                'satuanId' => rand(1, 10),
                'gambar' => 'cangkul.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Pupuk Urea',
                'satuanId' => rand(1, 10),
                'gambar' => 'cangkul.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Pupuk TSP',
                'satuanId' => rand(1, 10),
                'gambar' => 'cangkul.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ];

        // Using Query Builder
        $this->db->table('barang')->insertBatch($data);
    }
}
