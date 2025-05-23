<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Dasarsurat extends Seeder
{
    public function run()
    {
        $data = [
            [
                'noSurat' => 'R/' . rand(1, 100) . '/' . '2025',
                'tglSurat' =>  date('Y-m-d H:i:s'),
                'tentang' =>$faker->$address

            ]
        ];
        // Using Query Builder
        $this->db->table('dasarsurat')->insertBatch($data);
    }
}
