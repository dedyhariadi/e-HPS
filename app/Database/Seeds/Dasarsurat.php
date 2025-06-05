<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory as Faker;
use CodeIgniter\I18n\Time;

class Dasarsurat extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        helper('number');

        for ($i = 0; $i < 30; $i++) {
            $data = [
                [
                    'noSurat' => 'R/' . rand(1, 100) . '/' . number_to_roman(rand(1, 12)) . '/' . '2025',
                    'tglSurat' =>  Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
                    'tentang' => $faker->text(),
                    'pejabat' => 'Pejabat Pengadaan Barang/Jasa Dissenlekal',
                    'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                    'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
                ]
            ];
            // Using Query Builder
            $this->db->table('dasarsurat')->insertBatch($data);
        }
    }
}