<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalTravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jadwaltravel')->insert([
            'id' => '9e37cc22-5657-40d7-949f-46a38ccf9d69',
            'nama_travel' => 'Sanjaya',
            'asal_travel' => 'Jakarta',
            'tujuan_travel' => 'Bandung',
            'tanggal_travel' => '2024-01-01',
            'jam_travel' => '08:00',
            'harga_travel' => '100000',
            'kuota_travel' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('jadwaltravel')->insert([
            'id' => '9e37cc22-5657-40d7-949f-46a38ccf9d61',
            'nama_travel' => 'Nirmala',
            'asal_travel' => 'Yogyakarta',
            'tujuan_travel' => 'Semarang',
            'tanggal_travel' => '2024-01-15',
            'jam_travel' => '09:00',
            'harga_travel' => '100000',
            'kuota_travel' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('jadwaltravel')->insert([
            'id' => '9e37cc22-5657-40d7-949f-46a38ccf9d68',
            'nama_travel' => 'Kusuma Travel',
            'asal_travel' => 'Medan',
            'tujuan_travel' => 'Bekasi',
            'tanggal_travel' => '2024-01-11',
            'jam_travel' => '12:00',
            'harga_travel' => '200000',
            'kuota_travel' => '10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
