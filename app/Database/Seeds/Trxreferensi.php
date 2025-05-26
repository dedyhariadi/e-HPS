<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Trxreferensi extends Seeder
{
    public function run()
    {
       $data = [
                [
                    'GiatBarangId' => rand(1, 42),    // Assuming you have 10 kegiatan
                    'referensiId' => rand(1, 20),      // Assuming you have 50 barang
                ],
            ];
    }
}
