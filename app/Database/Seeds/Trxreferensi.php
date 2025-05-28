<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Trxreferensi extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 500; $i++) { // Adjust the number of records as needed
            $data = [
                [
                    'trxGiatBarangId' => rand(1, 77),    // Assuming you have 10 kegiatan
                    'referensiId' => rand(5, 124),      // Assuming you have 50 barang
                ],
            ];
            $this->db->table('trxreferensi')->insertBatch($data);
        }
    }
}
