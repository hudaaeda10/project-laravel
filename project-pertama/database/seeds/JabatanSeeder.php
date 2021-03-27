<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            [
                'nama_jabatan' => 'staff-IT',
                'gaji_pokok' => 5000000,
                'tunjangan_jabatan' => 3000000,
                'tunjangan_makan_perhari' => 25000,
                'tunjangan_transport_perhari' => 30000
            ],
            [
                'nama_jabatan' => 'staff-finance',
                'gaji_pokok' => 4000000,
                'tunjangan_jabatan' => 3000000,
                'tunjangan_makan_perhari' => 25000,
                'tunjangan_transport_perhari' => 30000
            ],
            [
                'nama_jabatan' => 'staff-accountant',
                'gaji_pokok' => 6000000,
                'tunjangan_jabatan' => 3000000,
                'tunjangan_makan_perhari' => 25000,
                'tunjangan_transport_perhari' => 30000
            ]
        ]);
    }
}
