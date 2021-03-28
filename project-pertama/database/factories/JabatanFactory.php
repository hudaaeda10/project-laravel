<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Jabatan;
use Faker\Generator as Faker;

$factory->define(Jabatan::class, function (Faker $faker) {
    return [
        'nama_jabatan' => $faker->word(),
        'gaji_pokok' => 5000000,
        'tunjangan_jabatan' => 3000000,
        'tunjangan_makan_perhari' => $faker->numberBetween(20000, 25000),
        'tunjangan_transport_perhari' => 30000
    ];
});
