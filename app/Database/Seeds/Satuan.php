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
                'namaSatuan' => 'buah',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'm3',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'sak',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'rol',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'gulung',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'kg',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'botol',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'dus',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'liter',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'box',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'set',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'paket',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Roll',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Lembar',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Pcs',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Kantong',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],
            [
                'namaSatuan' => 'Kepala',
                'created_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 year', '-1 month')->getTimestamp()),
                'updated_at' => Time::createFromTimestamp($faker->dateTimeBetween('-1 month', 'now')->getTimestamp()),
            ],

        ];


        // Using Query Builder
        $this->db->table('satuan')->insertBatch($data);
    }
}
