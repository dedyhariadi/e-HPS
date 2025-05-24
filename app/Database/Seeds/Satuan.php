<?php

namespace App\Database\Seeds;

use Faker\Factory as Faker;
use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class Satuan extends Seeder
{

    public function run()
    {
        $faker = Faker::create('id_ID');
        $data = [
            [
                'namaSatuan' => 'Pieces',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Gram',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Liter',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Meter',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Kilogram',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Centimeter',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Milimeter',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Inch',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Pound',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Karton',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Gallon',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Dus',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Box',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Set',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Paket',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Roll',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Lembar',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Pcs',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Paket',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Botol',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Kardus',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Koli',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Karton',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Pail',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Kantong',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Kepala',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-3 year', '-1 year')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', 'now')->getTimestamp()),
            ],

        ];


        // Using Query Builder
        $this->db->table('satuan')->insertBatch($data);
    }
}
