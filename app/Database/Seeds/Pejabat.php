<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;  //inisiasi helper time


use CodeIgniter\Database\Seeder;

class Pejabat extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) {

            $data = [
                [
                    'namaPejabat'   => $faker->name,
                    'pangkat'   => 'Kolonel Laut (E)',
                    'NRP'       => '11584/P',
                    'jabatan'   => 'Sekdis',
                    'created_at' => Time::createFromTimestamp($faker->unixTime()),
                    'updated_at' => Time::createFromTimestamp($faker->unixTime()),
                ],
                [
                    'namaPejabat'   => $faker->name,
                    'pangkat'   => 'Letkol Laut (E)',
                    'NRP'       => '16758/P',
                    'jabatan'   => 'Sekdis',
                    'created_at' => Time::createFromTimestamp($faker->unixTime()),
                    'updated_at' => Time::createFromTimestamp($faker->unixTime()),
                ],
            ];
            $this->db->table('pejabat')->insertBatch($data);
        }
        // Using Query Builder
    }
}
