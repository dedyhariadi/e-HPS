<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class TrxGiatBarang extends Seeder
{
    public function run()

    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) { // Adjust the number of records as needed


            $data = [
                [
                    'kegiatanId' => rand(1, 42),    // Assuming you have 10 kegiatan
                    'barangId' => rand(1, 20),      // Assuming you have 50 barang
                    'kebutuhan' => rand(1, 100),    // Random kebutuhan between 1 and 100
                    'jenis' => 'utama',             // Example jenis, can be 'utama' or 'pendukung'
                    'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                    'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
                ],
                [
                    'kegiatanId' => rand(1, 42),
                    'barangId' => rand(1, 20),
                    'kebutuhan' => rand(1, 100),
                    'jenis' => 'pendukung',
                    'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                    'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
                ],
                [
                    'kegiatanId' => rand(1, 42),
                    'barangId' => rand(1, 20),
                    'kebutuhan' => rand(1, 100),
                    'jenis' => 'utama',
                    'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                    'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
                ],
            ];
            //
            $this->db->table('trxgiatbarang')->insertBatch($data);
        }
    }
}
