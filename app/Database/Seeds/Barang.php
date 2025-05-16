<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Barang extends Seeder
{
    public function run()
    {
        $data = [
            [
                'namaBarang' => 'Keranjang',
                'satuanId' => rand(1, 10),
                'gambar' => 'keranjang.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Pasir',
                'satuanId' => rand(1, 10),
                'gambar' => 'pasir.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Semen',
                'satuanId' => rand(1, 10),
                'gambar' => 'semen.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Kerikil',
                'satuanId' => rand(1, 10),
                'gambar' => 'kerikil.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Selang 1/2"',
                'satuanId' => rand(1, 10),
                'gambar' => 'selang.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Tali 12 mm',
                'satuanId' => rand(1, 10),
                'gambar' => 'tali.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Terpal 10x10 (A12)',
                'satuanId' => rand(1, 10),
                'gambar' => 'terpal.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Peti',
                'satuanId' => rand(1, 10),
                'gambar' => 'peti.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Kawat 0,8 mm',
                'satuanId' => rand(1, 10),
                'gambar' => 'kawat.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Kain majun',
                'satuanId' => rand(1, 10),
                'gambar' => 'KainMajun.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Hand Sanitizer',
                'satuanId' => rand(1, 10),
                'gambar' => 'handsanitiszer.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Masker kain',
                'satuanId' => rand(1, 10),
                'gambar' => 'maskerkain.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Terpal 6x9 (A12)',
                'satuanId' => rand(1, 10),
                'gambar' => 'terpal.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Pallet',
                'satuanId' => rand(1, 10),
                'gambar' => 'pallet.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Hand Pallet',
                'satuanId' => rand(1, 10),
                'gambar' => 'handpallet.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Sabun Hijau',
                'satuanId' => rand(1, 10),
                'gambar' => 'sabunhijau.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Cangkul',
                'satuanId' => rand(1, 10),
                'gambar' => 'cangkul.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Sekop',
                'satuanId' => rand(1, 10),
                'gambar' => 'sekop.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Ember',
                'satuanId' => rand(1, 10),
                'gambar' => 'ember.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'namaBarang' => 'Cetok',
                'satuanId' => rand(1, 10),
                'gambar' => 'Cetok.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ];

        // Using Query Builder
        $this->db->table('barang')->insertBatch($data);
    }
}
